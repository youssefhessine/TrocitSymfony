<?php

namespace App\Controller;

use App\Entity\Communaute;
use App\Form\SearchFormType;
use App\Form\CommunauteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class CommunauteController extends AbstractController
{
    #[Route('/sponsor', name: 'app_sponsor')]
    public function index(): Response
    {
        return $this->render('communaute/index.html.twig', [
            'controller_name' => 'CommunauteController',
        ]);
    }




    /**
     * @Route("/displaysponsor", name="displaysponsor")
     */
    public function afficherSponsors(EntityManagerInterface $em): Response
    {
        $Communautes= $em->getRepository(Communaute::class)->findAll();
        $form=$this->createForm(SearchFormType::class);
        return $this->render('communaute/index.html.twig', [
            'b'=>$Communautes,
            'f'=>$form->createView()
        ]);
    }
    /**
     * @Route("/addSponsor", name="addSponsor")
     */
    public function addSponsor(Request $request,EntityManagerInterface $entityManagerInterface): Response
    {
       $Communaute=new Communaute();
       $form=$this->createForm(CommunauteType::class,$Communaute);
       $form->handleRequest($request);
       if($form->isSubmitted() && $form->isValid()){
           $entityManagerInterface->persist($Communaute);
           $entityManagerInterface->flush();

           return $this->redirectToRoute('displaysponsor');
       }
       else
       return $this->render('communaute/ajouterCommunaute.html.twig',['f'=>$form->createView()]);

    }


    /**
     * @Route("/modifierSponsor/{id}", name="modifierSponsor")
     */
    public function modifierEvent(Request $request,EntityManagerInterface $em,$id): Response
    {
      
       $Communaute=$em->getRepository(Communaute::class)->find($id);
       $form=$this->createForm(CommunauteType::class,$Communaute);
       $form->handleRequest($request);
       if($form->isSubmitted() && $form->isValid()){           
           $em->flush();

           return $this->redirectToRoute('displaysponsor');
       }
       else
       return $this->render('communaute/modifierCommunaute.html.twig',['f'=>$form->createView()]);

    }


    /**
* @Route("/deleteSponsor", name="deleteSponsor")
*/
public function deleteSponsor(Request $request, EntityManagerInterface $entityManager)
{

    $Communaute=$entityManager->getRepository(Communaute::class)->findOneBy(array('id'=>$request->query->get("id")));
    $entityManager->remove($Communaute);
    $entityManager->flush();
    //return new Response("success");

    $Communaute= $entityManager->getRepository(Communaute::class)->findAll();
        return $this->render('communaute/index.html.twig', [
            'b'=>$Communaute
        ]);
}

















    /**
     * @Route("/afficherSponsorjSON", name="afficherSponsore")
     */
    public function afficherPub(EntityManagerInterface $em, SerializerInterface $serializerInterface): Response
    {
        $pub = $em->getRepository(Communaute::class)->findAll();
        
        $json=$serializerInterface->serialize($pub,'json',['groups'=>'Communaute']);
        return new Response($json);
    }


    /**
     * @Route("/registerSponsor", name="registerSponsor")
     */
    public function registerSponsor( Request $request,SerializerInterface $serializer,EntityManagerInterface $manager){
        $Pub = new Communaute();


        $Pub->setNom($request->query->get("nom"));
        $Pub->setAdresse($request->query->get("adresse"));
        $Pub->setEmail($request->query->get("email"));

        $Pub->setNumTel((int) $request->query->get("num_tel"));
        $manager->persist($Pub);
        $manager->flush();
        $json=$serializer->serialize($Pub,'json',['groups'=>'Sponsor']);
        return new Response($json);
    }


    /**
     * @Route("/updateSponsor", name="updateSponsor")
     */
    public function updateSponsor( Request $request,serializerInterface $serializer,EntityManagerInterface $entityManager)
        {
            $Pub = new Communaute();
            $Pub=$entityManager->getRepository(Communaute::class)->findOneBy(array('id'=>$request->query->get("id")));
            $Pub->setNom($request->query->get("nom"));
            $Pub->setAdresse($request->query->get("adresse"));
            $Pub->setEmail($request->query->get("email"));
            $Pub->setNumTel($request->query->get("num_tel"));
            $entityManager->persist($Pub);
            $entityManager->flush();

            return new Response("success");

        }

    
        
    /**
    * @Route("/deleteSponsorjson", name="deleteSponsorjson")
    */
    public function deleteSponsoree( 
        Request $request,
        serializerInterface $serializer,
        EntityManagerInterface $entityManager
    ){

    $Pub=$entityManager->getRepository(Communaute::class)->findOneBy(array('id'=>$request->query->get("id")));

    $entityManager->remove($Pub);
    $entityManager->flush();
    return new Response("success");

    }





}



