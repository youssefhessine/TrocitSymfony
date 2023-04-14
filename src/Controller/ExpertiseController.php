<?php

namespace App\Controller;

use App\Entity\Expertise;
use App\Form\ExpertiseType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/expertise')]
class ExpertiseController extends AbstractController
{
    #[Route('/', name: 'expertise_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $expertises = $entityManager
            ->getRepository(Expertise::class)
            ->findAll();

        return $this->render('expertise/index.html.twig', [
            'expertises' => $expertises,
        ]);
    }

    #[Route('/admin', name: 'expertise_index_admin', methods: ['GET'])]
    public function indexAdmin(EntityManagerInterface $entityManager): Response
    {
        $expertises = $entityManager
            ->getRepository(Expertise::class)
            ->findAll();

        return $this->render('expertise/indexA.html.twig', [
            'expertises' => $expertises,
        ]);
    }

    #[Route('/new', name: 'expertise_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $expertise = new Expertise();
        $form = $this->createForm(ExpertiseType::class, $expertise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($expertise);
            $entityManager->flush();

            return $this->redirectToRoute('expertise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('expertise/new.html.twig', [
            'expertise' => $expertise,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'expertise_show', methods: ['GET'])]
    public function show(Expertise $expertise): Response
    {
        return $this->render('expertise/show.html.twig', [
            'expertise' => $expertise,
        ]);
    }

    #[Route('/{id}/edit', name: 'expertise_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Expertise $expertise, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ExpertiseType::class, $expertise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('expertise_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('expertise/edit.html.twig', [
            'expertise' => $expertise,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'expertise_delete', methods: ['POST'])]
    public function delete(Request $request, Expertise $expertise, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($expertise);
        $entityManager->flush();

        return $this->redirectToRoute('expertise_index', [], Response::HTTP_SEE_OTHER);
    }
}
