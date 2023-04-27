<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\LoginFormType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;
use App\Service\MailerService;
use App\Repository\UserRepository;


class SecurityController extends AbstractController
{
    
    #[Route('/login', name: 'log_in', methods: ['GET', 'POST'])]
    public function login(UserRepository $userRepository,  Request $req, EntityManagerInterface $entityManager): Response
    {
        $error = '';
        $form1 = $this->createForm(LoginFormType::class);
        $form1->handleRequest($req);
        if ($form1->isSubmitted() && $form1->isValid()) {
            $data = $form1->getData();
            // Récupérer l'utilisateur correspondant à l'e-mail entré
            $user = $userRepository->findOneByPassword($form1->getData('Password'));
           // $user1 = $userRepository->findOneByPassword($form1->getData('Password'));

            // Vérifier si le mot de passe entré correspond à celui stocké dans la base de données
            if ($user != null) {
                dump('Authentification réussie');
            
                // Authentification réussie, redirection
                if ($user->getRole() == 'Admin') {
                    return $this->redirectToRoute('app_user_show', ['id' => $user->getId()]);
                } else {
                    return $this->redirectToRoute('app_user_show1', ['id' => $user->getId()]);
                }
            } else {
                $error = 'Adresse e-mail ou mot de passe incorrect';
                dump($error);
            }
            
    }

    // Afficher le formulaire de connexion avec l'éventuelle erreur
    return $this->render('Security/login.html.twig', ['form' => $form1->createView(), 'error' => $error]);
}

#[Route('/forget', name: 'forget', methods: ['GET', 'POST'])]
    public function forget(UserRepository $userRepository,  Request $req, EntityManagerInterface $entityManager, MailerService $mailerService): Response
    {
        $error = '';
        $form1 = $this->createForm(LoginFormType::class);
        $form1->handleRequest($req);
        if ($form1->isSubmitted() && $form1->isValid()) {
            $data = $form1->getData();
            // Récupérer l'utilisateur correspondant à l'e-mail entré
            $user = $userRepository->findOneByEmail($form1->getData('Email'));
           // $user1 = $userRepository->findOneByPassword($form1->getData('Password'));

            // Vérifier si le mot de passe entré correspond à celui stocké dans la base de données
            if ($user != null) {
                dump('Authentification réussie');
                $token = random_int(0, 99999);
                
            
                $user->setPassword($token);
            
                $entityManager->flush();

                     // mailing : 
            $transport = Transport::fromDsn('smtp://trocitesprit2023@gmail.com:nzllowkwnfjhtxfz@smtp.gmail.com:587');

            $mailer = new Mailer($transport);

            $email = (new Email());

            $email->from('trocitesprit2023@gmail.com');

            $email->to('youssefhessine17@gmail.com');

            $email->subject('new password');
            
            $email->html(
                $this->renderView('email/template.html.twig', [
                    'offre' => $offre,
                ])
            );

            try {
                $mailer->send($email);
                } catch (TransportExceptionInterface $e) {
                    }
                

                return $this->render('Security/login.html.twig', ['form' => $form1->createView(), 'error' => $error]);
                
            } else {
                $error = 'Adresse e-mail ou mot de passe incorrect';
                dump($error);
            }
            
    }

    // Afficher le formulaire de connexion avec l'éventuelle erreur
    return $this->render('Security/forgetpassword.html.twig', ['form' => $form1->createView(), 'error' => $error]);
}




    }
    


   


