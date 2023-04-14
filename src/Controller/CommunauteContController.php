<?php

namespace App\Controller;

use App\Entity\Communaute;
use App\Form\CommunauteType;
use App\Repository\CommunauteRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/communaute/cont')]
class CommunauteContController extends AbstractController
{
    #[Route('/', name: 'app_communaute_cont_index', methods: ['GET'])]
    public function index(CommunauteRepository $communauteRepository): Response
    {
        return $this->render('communaute_cont/index.html.twig', [
            'communautes' => $communauteRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_communaute_cont_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CommunauteRepository $communauteRepository): Response
    {
        $communaute = new Communaute();
        $form = $this->createForm(CommunauteType::class, $communaute);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $communauteRepository->save($communaute, true);

            return $this->redirectToRoute('app_communaute_cont_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('communaute_cont/new.html.twig', [
            'communaute' => $communaute,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_communaute_cont_show', methods: ['GET'])]
    public function show(Communaute $communaute): Response
    {
        return $this->render('communaute_cont/show.html.twig', [
            'communaute' => $communaute,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_communaute_cont_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Communaute $communaute, CommunauteRepository $communauteRepository): Response
    {
        $form = $this->createForm(CommunauteType::class, $communaute);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $communauteRepository->save($communaute, true);

            return $this->redirectToRoute('app_communaute_cont_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('communaute_cont/edit.html.twig', [
            'communaute' => $communaute,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_communaute_cont_delete', methods: ['POST'])]
    public function delete(Request $request, Communaute $communaute, CommunauteRepository $communauteRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$communaute->getId(), $request->request->get('_token'))) {
            $communauteRepository->remove($communaute, true);
        }

        return $this->redirectToRoute('app_communaute_cont_index', [], Response::HTTP_SEE_OTHER);
    }
}
