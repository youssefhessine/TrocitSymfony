<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\User1Type;
use App\Form\TroqeurType;
use App\Repository\UserRepository;
use App\Repository\OffreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\WalletRepository ; 
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

#[Route('/user')]
class UserController extends AbstractController

{
    #[Route('/admin', name: 'display_admin', methods: ['GET'])]
    public function indexAdmin(): Response
    {

        return $this->render('admin/index.html.twig'
        );
    }

    #[Route('/creer', name: 'creer', methods: ['GET','POST'])]
    public function newtroqeur(Request $request, EntityManagerInterface $entityManager, WalletRepository $repo): Response
    {
        $user = new User();
        $w = $repo->find(3); 
        $user->setIdWallet($w) ; 
       /* var_dump($w) ; 
        die() ; */
        $form = $this->createForm(TroqeurType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('log_inf', [], Response::HTTP_SEE_OTHER);
            
        }

        return $this->renderForm('troqeur/creercompte.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }


    


    #[Route('/', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/index.html.twig', [
            'users' => $userRepository->findAll(),
        ]);
    }


    

   


    #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager, WalletRepository $repo): Response
    {
        $user = new User();
        $w = $repo->find(3); 
        $user->setIdWallet($w) ; 
       /* var_dump($w) ; 
        die() ; */
        $form = $this->createForm(User1Type::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/new.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/show1/{id}', name: 'app_user_show1', methods: ['GET'])]
public function show1(User $user, OffreRepository $offreRepository ,Request $request): Response
{
    
    $userId = $request->attributes->getInt('id');
    $offres = $offreRepository->findOffresByUserId($userId);


    return $this->render('user/show1.html.twig', [
        'user' => $user,
        'offres' =>$offres,
    ]);
}

#[Route('/show/{id}', name: 'app_user_show', methods: ['GET'])]
public function show2(User $user): Response
{
    return $this->render('user/show.html.twig', [
        'user' => $user,
        

    ]);
}

    


    #[Route('/edit/{id}', name: 'app_user_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(User1Type::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('user/edit.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }

    #[Route('/edit1/{id}', name: 'app_user_edit1', methods: ['GET', 'POST'])]
    public function edit1(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TroqeurType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_user_show1', ['id' => $user->getId()]);
        }

        return $this->renderForm('user/edit1.html.twig', [
            'user' => $user,
            'form' => $form,
        ]);
    }


    #[Route('/{id}', name: 'app_user_delete', methods: ['POST'])]
    public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
    }

    

    
    

}
