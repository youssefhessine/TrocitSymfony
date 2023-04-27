<?php

namespace App\Controller;

use App\Entity\Troc;
use App\Repository\TrocRepository;
use App\Form\TrocType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/troc')]
class TrocController extends AbstractController
{

    #[Route('/front', name: 'display_front', methods: ['GET'])]
    public function indexAdmin(): Response
    {

        return $this->render('troc/showFront.html.twig');
    }

    #[Route('/', name: 'app_troc_index', methods: ['GET'])]
    public function index(TrocRepository $trocRepository): Response
    {
        return $this->render('troc/index.html.twig', [
            'trocs' => $trocRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_troc_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TrocRepository $trocRepository): Response
    {
        $troc = new Troc();
        $form = $this->createForm(TrocType::class, $troc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trocRepository->save($troc, true);

            return $this->redirectToRoute('app_troc_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('troc/new.html.twig', [
            'troc' => $troc,
            'form' => $form,
        ]);
    }

    #[Route('/{idTroc}', name: 'app_troc_show', methods: ['GET'])]
    public function show(Troc $troc): Response
    {
        return $this->render('troc/show.html.twig', [
            'troc' => $troc,
        ]);
    }

    #[Route('/{idTroc}/edit', name: 'app_troc_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Troc $troc, TrocRepository $trocRepository): Response
    {
        $form = $this->createForm(TrocType::class, $troc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trocRepository->save($troc, true);

            return $this->redirectToRoute('app_troc_index', [], Response::HTTP_SEE_OTHER);
        }
        return $this->renderForm('troc/edit.html.twig', [
            'troc' => $troc,
            'form' => $form,
        ]);
    }

    #[Route('/{idTroc}', name: 'app_troc_delete', methods: ['POST'])]
    public function delete(Request $request, Troc $troc, TrocRepository $trocRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$troc->getIdTroc(), $request->request->get('_token'))) {
            $trocRepository->remove($troc, true);
        }

        return $this->redirectToRoute('app_troc_index', [], Response::HTTP_SEE_OTHER);
    }
}
