<?php

namespace App\Controller;

use App\Entity\Don;
use App\Form\DonType;
use App\Form\SendmailType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/don')]
class DonController extends AbstractController
{
    #[Route('/', name: 'don_index', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager): Response
    {
        $dons = $entityManager
            ->getRepository(Don::class)
            ->findAll();

        return $this->render('don/index.html.twig', [
            'dons' => $dons,
        ]);
    }

    #[Route('/new', name: 'don_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $don = new Don();
        $form = $this->createForm(DonType::class, $don);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           /** @var UploadedFile $file */
           $file = $form->get('image')->getData();
           $filename=md5(uniqid()).'.'.$file->guessExtension();
           $file->move(
            $this->getParameter('Images_directory'),
            $filename
            
        );
            $don->setImage($filename);
            $entityManager->persist($don);
            $entityManager->flush();

            return $this->redirectToRoute('don_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('don/new.html.twig', [
            'don' => $don,
            'form' => $form,
        ]);
    }

    #[Route('/{idDon}', name: 'don_show', methods: ['GET'])]
    public function show(Don $don): Response
    {
        return $this->render('don/show.html.twig', [
            'don' => $don,
        ]);
    }

    #[Route('/{idDon}/edit', name: 'don_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Don $don, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(DonType::class, $don);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('don_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('don/edit.html.twig', [
            'don' => $don,
            'form' => $form,
        ]);
    }

    #[Route('/{idDon}', name: 'don_delete', methods: ['POST'])]
    public function delete(Request $request, Don $don, EntityManagerInterface $entityManager): Response
    {
        $entityManager->remove($don);
        $entityManager->flush();
        return $this->redirectToRoute('don_index', [], Response::HTTP_SEE_OTHER);
    }
    #[Route('/email/{email_use}', name: 'sendMailToUser')]
    public function sendEmail(MailerInterface $mailer,Request $request,$email_use): Response
    {
        $form =$this->createForm(SendmailType::class,null);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid())
        {
            $message=$form->get('message')->getData();
            $subject=$form->get('subject')->getData();
            $email = (new Email())
                ->from('barrani.hamza@esprit.tn')
                ->to((string)$email_use)
                ->subject((string)$subject)
                ->text('Sending emails is fun again!')
                ->html("<p>$message</p>");
            $mailer->send($email);
            $this->addFlash('success', 'votre email a ete bien envoyer');
            return $this->redirectToRoute('don_index');
        }
        return $this->render('don/sendMail.html.twig', ['form' => $form->createView(),'user_email'=>$email_use]);
    }
}
