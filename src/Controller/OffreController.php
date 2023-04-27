<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Entity\Categorie;
use App\Form\OffreType;
use App\Repository\OffreRepository;
use App\Entity\User;
use App\Entity\Views;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\MailerService;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;




#[Route('/offre')]
class OffreController extends AbstractController
{
    #[Route('/', name: 'app_offre_index', methods: ['GET'])]
    public function index(OffreRepository $offreRepository): Response
    {
      
        // execution fn  ( metier popularité )  
        $entityManager = $this->getDoctrine()->getManager();
        
        $qb = $entityManager->createQueryBuilder()
            ->select('v.nomCategorie AS category, COUNT(v.id) AS views')
            ->from('App\Entity\Views', 'v')
            ->groupBy('v.nomCategorie')
            ->orderBy('views', 'DESC')
            ->setMaxResults(1);

        $result = $qb->getQuery()->getOneOrNullResult();

        $mostViewedCategory = $result['category'] ?? null;
        // fin 
        return $this->render('offre/index.html.twig', [
            'offres' => $offreRepository->findAll(),'mostViewedCategory' => $mostViewedCategory,
        ]);
    }

    #[Route('/new', name: 'app_offre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, OffreRepository $offreRepository): Response
    {
        $offre = new Offre();
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $imageFile = $form['imageFile']->getData();

            if ($imageFile) {
                $newFilename = uniqid().'.'.$imageFile->guessExtension();
                $imageFile->move(
                    $this->getParameter('offres_directory'),
                    $newFilename
                );
                $offre->setImageFilename($newFilename);
            }
            $offreRepository->save($offre, true);

            return $this->redirectToRoute('app_offre_index', [], Response::HTTP_SEE_OTHER);
            
        }

        return $this->renderForm('offre/new.html.twig', [
            'offre' => $offre,
            'form' => $form,
           // 'categorie' => $categorieRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_offre_show', methods: ['GET'])]
    public function show(Offre $offre , MailerService $mailerService): Response
    {    
        // ( add view ) metier popularité  

        $viewRepository = $this->getDoctrine()->getRepository(Views::class);
        
  
            // $view = $viewRepository->find(['offre' => $offre->getId(), 'user' => $user->getId()]);
            $userid = 10;

            $view = $viewRepository->findOneBy([
                'idOffre' => $offre->getId(),
                'idUser' => $userid
            ]);
            //verif ken el view existe ou non 
            if (!$view) {
                $entityManager = $this->getDoctrine()->getManager();
                $newView = new Views();
                $newView->setIdOffre($offre->getId());
                $newView->setIdUser($userid);
                $newView->setNomCategorie($offre->getNomCategorie()->getNom());
                $entityManager->persist($newView);
                $entityManager->flush();
            }
         
        
            return $this->render('offre/show.html.twig', [
                'offre' => $offre,
            ]);
    }

    #[Route('/{id}/troquer', name: 'app_offre_troquer', methods: ['POST'])]
public function troquer(Offre $offre, MailerService $mailerService): Response
{
 
          // mailing : 
            $transport = Transport::fromDsn('smtp://trocitesprit2023@gmail.com:nzllowkwnfjhtxfz@smtp.gmail.com:587');

            $mailer = new Mailer($transport);

            $email = (new Email());

            $email->from('trocitesprit2023@gmail.com');

            $email->to('youssefhessine17@gmail.com');

            $email->subject('Demande de troc pour votre offre');
            
            $email->html(
                $this->renderView('email/template.html.twig', [
                    'offre' => $offre,
                ])
            );

            try {
                $mailer->send($email);
                } catch (TransportExceptionInterface $e) {
                    }
        return $this->render('offre/show.html.twig', [
            'offre' => $offre,
        ]);
}



    #[Route('/{id}/edit', name: 'app_offre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Offre $offre, OffreRepository $offreRepository): Response
    {
        $form = $this->createForm(OffreType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           // $offre->setIdUser(11);
            $imageFile = $form['imageFile']->getData();

            if ($imageFile) {
                $newFilename = uniqid().'.'.$imageFile->guessExtension();
                $imageFile->move(
                    $this->getParameter('offres_directory'),
                    $newFilename
                );
                $offre->setImageFilename($newFilename);
            }
            $offreRepository->save($offre, true);
            
            return $this->redirectToRoute('app_offre_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('offre/edit.html.twig', [
            'offre' => $offre,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_offre_delete', methods: ['POST'])]
    public function delete(Request $request, Offre $offre, OffreRepository $offreRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$offre->getId(), $request->request->get('_token'))) {
            $offreRepository->remove($offre, true);
        }

        return $this->redirectToRoute('app_offre_index', [], Response::HTTP_SEE_OTHER);
    }



}
