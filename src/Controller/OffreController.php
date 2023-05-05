<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Entity\Categorie;
use App\Form\OffreType;
use App\Repository\OffreRepository;
use App\Entity\User;
use App\Entity\Views;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mime\Email;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\NormalizerInterface;
use Doctrine\Persistence\ManagerRegistry;






#[Route('/trocit')]
class OffreController extends AbstractController
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }
    #[Route('/', name: 'app_offre_index', methods: ['GET'])]
    public function index(OffreRepository $offreRepository , UserRepository $userRepository , Request $request ): Response
    {
        $id = $request->query->getInt('id');
        $user = $userRepository->find($id);

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
            'user'=> $user,
        ]);
    }
    #[Route('/index', name: 'app_offre_index_final', methods: ['GET'])]
    public function indexfinal(OffreRepository $offreRepository): Response
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
      
        return $this->render('offre/indexF.html.twig', [
            'offres' => $offreRepository->findAll(),'mostViewedCategory' => $mostViewedCategory,
        ]);
      
    }
  

    #[Route('/new/{id}', name: 'app_offre_new', methods: ['GET', 'POST'])]
    public function new(Request $request, OffreRepository $offreRepository  , UserRepository $userRepository ): Response
    {
       // $entityManager = $this->getDoctrine()->getManager();
       $id = $request->attributes->getInt('id');
       $user = $userRepository->find($id);
       
        $offre = new Offre();
        $form = $this->createForm(OffreType::class, $offre);
        $offre->setIdUser($user->getId());
        $form->handleRequest($request);
        
        //dump($user);
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
        /*    $entityManager->persist($offre);
            $entityManager->flush();*/
            return $this->redirectToRoute('app_offre_index', ['id' => $user->getId()], Response::HTTP_SEE_OTHER);
            
        }

        return $this->renderForm('offre/new.html.twig', [
            'offre' => $offre,
            'form' => $form,
           // 'categorie' => $categorieRepository->findAll(),
        ]);
    }

    #[Route('/offre/{id_user}/{id}', name: 'app_offre_show_user', methods: ['GET'])]
    public function show_user(Offre $offre ,Request $request , UserRepository $userRepository  ): Response
    {    
        // ( add view ) metier popularité  
        $id = $request->attributes->getInt('id_user');
        $user = $userRepository->find($id);
        $viewRepository = $this->getDoctrine()->getRepository(Views::class);
        
  
           // $view = $viewRepository->find(['offre' => $offre->getId(), 'user' => $user->getId()]);
            //$userid = 11;
            
            $view = $viewRepository->findOneBy([
                'idOffre' => $offre->getId(),
                'idUser' => $user->getId()
            ]);

          
            
            if (!$view) {
                $entityManager = $this->getDoctrine()->getManager();
                $newView = new Views();
                $newView->setIdOffre($offre->getId());
                $newView->setIdUser($user->getId());
                $newView->setNomCategorie($offre->getNomCategorie()->getNom());
                $entityManager->persist($newView);
                $entityManager->flush();
            }
         
        
            return $this->render('offre/show_user.html.twig', [
                'offre' => $offre,
                'user' =>$user,

            ]);
    }
    #[Route('/offre/{id}', name: 'app_offre_show', methods: ['GET'])]
    public function show(Offre $offre ,Request $request  ): Response
    {    
        // ( add view ) metier popularité  
       // $id = $request->attributes->getInt('id_user');
       // $user = $userRepository->find($id);
        $viewRepository = $this->getDoctrine()->getRepository(Views::class);
        
  
           // $view = $viewRepository->find(['offre' => $offre->getId(), 'user' => $user->getId()]);
           $userid = 17;
            
            $view = $viewRepository->findOneBy([
                'idOffre' => $offre->getId(),
                'idUser' => $userid
            ]);

          
            
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
public function troquer(Offre $offre): Response
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



    #[Route('/{id}/edit/{id_user}', name: 'app_offre_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Offre $offre, OffreRepository $offreRepository , UserRepository $userRepository): Response
    {

        $id = $request->attributes->getInt('id_user');
       $user = $userRepository->find($id);
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
            
            return $this->redirectToRoute('app_user_show1', ['id' => $user->getId()], Response::HTTP_SEE_OTHER);
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

    // json 

    #[Route('/deletejson/{id}', name: 'app_offre_delete_json')]
    public function deletejson(Request $req , $id , NormalizerInterface $Normalizer)
     {
 
         $em = $this->getDoctrine()->getManager();
         $offre = $em->getRepository(Offre::class)->find($id);
     
         if (!$offre) {
             throw $this->createNotFoundException('Offre not found');
         }
     
         $em->remove($offre);
         $em->flush();
     
         $json = $Normalizer->normalize($offre, 'json' ,['groups' => 'offres']); 
    return new Response('Offre updated ' . json_encode($json));
 } 
    
    
        
    /*    $response = ['success' => false];

    $offreRepository->remove($offre, true);
    $response['success'] = true;

    return new JsonResponse($response);*/
        




#[Route('/updatejson/{id}', name: 'updatejson')]
public function updatejson(Request $req , $id , NormalizerInterface $Normalizer  )
{       
    $em = $this->getDoctrine()->getManager();
    $offre = $em->getRepository(Offre::class)->find($id);
    
    // Retrieve the category entity based on the category name
   // $nomCategorie = $req->get('nom');
   // $categorie = $em->getRepository(Categorie::class)->findOneBy(['nom' => $nomCategorie]);
    
    //if (!$categorie) {
        // Handle the case when the category does not exist
      //  throw $this->createNotFoundException('Category not found');
    //}
    $offre->setTitre($req->get('titre'));
    $offre->setType($req->get('type')); 
    $offre->setDescription($req->get('description'));
    $offre->setDate($req->get('date'));
    $offre->setImageFilename($req->get('imageFilename'));
    //$offre->setNomCategorie($req->get('nomCategorie'));

    $em->flush();

    $json = $Normalizer->normalize($offre, 'json', ['groups' => 'offres']); 
    return new Response('Offre updated: ' . json_encode($json));
}
 //$offre->setNomCategorie($offre->getNomCategorie()->getNom());
//http://127.0.0.1:8000/offre/updateoffrejson/17?titre=pcaa&type=Bien&description=aake&date=2015-10-10&imageFilename=644935f8e7774.jpg&nomcategorie=cuisine
}
