<?php

namespace App\Controller;
use App\Entity\Club;
use App\Entity\Rating;
use App\Entity\Communaute;
use App\Entity\Utilisateur;
use PDO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface ;
use Symfony\Component\HttpFoundation\Request;
use App\Form\ClubType;
use App\Form\UpdateClubType;
use Symfony\Component\Serializer\SerializerInterface;

class ClubController extends AbstractController
{
    #[Route('/', name: 'app_publicite')]
    public function index(EntityManagerInterface $em): Response
    {
        $users= $em->getRepository(Club::class)->findAll();
        return $this->render('basefront.html.twig', [
            'b'=>$users
        ]);
    }
    /**
     * @Route("/ee", name="displaypub")
     */
    public function afficherpublicites(EntityManagerInterface $em): Response
    {
        $clubs= $em->getRepository(Club::class)->findAll();
        return $this->render('club/index.html.twig', [
            'b'=>$clubs
        ]);
    }




 /**
     * @Route("/showrand", name="showrand")
     */
    public function showrand(EntityManagerInterface $em): Response
    {
        $sql = "SELECT * FROM club ORDER BY RAND() LIMIT 1";
        $stmt = $em->getConnection()->prepare($sql);
        $result = $stmt->execute();
        $values = $result->fetch(PDO::FETCH_ASSOC);
        
            $club = new Club();
            $club->setId($values['id']);
            $club->setNomPub($values['nom_pub']);
            $club->setDescription($values['description']);
            $club->setImage($values['image']);
        

        return $this->render('club/showrandpub.html.twig', [
            'b'=>$club
        ]);
    }


      /**
     * @Route("/rate", name="rating")
     */
    public function rate(Request $request,EntityManagerInterface $entityManagerInterface,SerializerInterface $serializer): Response
    {
       $rate=new Rating();
       $user=$entityManagerInterface->getRepository(Utilisateur::class)->findOneBy(array('id'=>"1"));
       $pub=$entityManagerInterface->getRepository(club::class)->findOneBy(array('id'=>$request->query->get("idpub")));

            $rate->setRate($request->query->get("rate"));
            $rate->setIduser($user);
            $rate->setIdpub($pub);
           $entityManagerInterface->persist($rate);
           $entityManagerInterface->flush();
           $json= new JsonResponse();
   
    
           return $json;
   }
       

 


    /**
     * @Route("/addpublicite", name="addpub")
     */
    public function addpublicite(Request $request,EntityManagerInterface $entityManagerInterface): Response
    {
       $club=new club();
       $form=$this->createForm(ClubType::class,$club);
       $form->handleRequest($request);
       if($form->isSubmitted() && $form->isValid()){


        /** @var UploadedFile $file */
        $file = $form->get('image')->getData();
        $filename=md5(uniqid()).'.'.$file->guessExtension();
        $file->move(
         $this->getParameter('Images_directory'),
         $filename
         
     );

            $club->setImage($filename);
           $entityManagerInterface->persist($club);
           $entityManagerInterface->flush();

           return $this->redirectToRoute('displaypub');
       }
       else
       return $this->render('club/ajouterclub.html.twig',['f'=>$form->createView()]);

    }


    /**
     * @Route("/modifierpublicite/{id}", name="modifierpublicite")
     */
    public function modifierEvent(Request $request,EntityManagerInterface $em,$id): Response
    {
      
       $club=$em->getRepository(Club::class)->find($id);
       $form=$this->createForm(UpdateClubType::class,$club);
       $form->handleRequest($request);
       if($form->isSubmitted() && $form->isValid()){           
           $em->flush();

           return $this->redirectToRoute('displaypub');
       }
       else
       return $this->render('club/modifierclub.html.twig',['f'=>$form->createView()]);

    }


    /**
* @Route("/deletePublicite", name="deletePublicite")
*/
public function deletePublicite( 
    Request $request,
    EntityManagerInterface $entityManager

){

$Club=$entityManager->getRepository(Club::class)->findOneBy(array('id'=>$request->query->get("id")));
$entityManager->remove($Club);
$entityManager->flush();
//return new Response("success");

$Club= $entityManager->getRepository(Club::class)->findAll();
return $this->render('club/index.html.twig', [
    'b'=>$Club
]);

}





/**
     * @Route("/stats", name="stats")
     */
    public function statistiques(EntityManagerInterface $em){
        $dates = [];
        $produitCount = [];
        $categColor = [];
       
        $sql = "SELECT nom_pub , id FROM club";
        $stmt = $em->getConnection()->prepare($sql);
        $result = $stmt->execute();



        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
            $dates[] = $row["nom_pub"];
            $produitCount[] = $row["id"];
            $sql2 = "SELECT SUM(rate)  as rate from rating where idpub=".strval($row["id"]) ;
             $stmt2 = $em->getConnection()->prepare($sql2);
            $result2 = $stmt2->execute();
            $row2 = $result2->fetch(PDO::FETCH_ASSOC);
            if($row2["rate"]==null)
            {
                $categColor[]=0;
            }
            else
            $categColor[] = $row2["rate"];
 
        }
    
        // On va chercher toutes les catégories
   
       
      
  
  
        return $this->render('club/stat.html.twig', [
            'dates' => json_encode($dates),
            'produitCount' => json_encode($categColor),
        ]);
  
  
    }








/**
 * @Route("/searched", name="search")
 */
public function search(Request $request,SerializerInterface $serializer,EntityManagerInterface $em)
{
   
    $soponsorRepository = $em->getRepository(Club::class);
  // deserialize the form data into an array
 

  // retrieve the search query from the 'query' attribute
    $queryBuilder = $soponsorRepository->createQueryBuilder('b');
    
    $search = $request->query->get('search');
   

    
    
        $queryBuilder->where('b.nomPub LIKE :search OR b.description LIKE :search OR b.image LIKE :search ')
                     ->setParameter('search', "%$search%");

    
    $result = $queryBuilder->getQuery()->getResult();
    $json=$serializer->serialize($result,'json',['groups'=>'Club']);
   
    
    return new Response($json);
}









    /**
     * @Route("/afficherP", name="affi")
     */
    public function affidd(EntityManagerInterface $em, SerializerInterface $serializerInterface): Response
    {
        $pub = $em->getRepository(Club::class)->findAll();
        
        $json=$serializerInterface->serialize($pub,'json',['groups'=>'Publicite']);
      
        return new Response($json);
    }








    /**
     * @Route("/afficherPublicitejSON", name="afficherPublicitee")
     */
    public function afficherPub(EntityManagerInterface $em, SerializerInterface $serializerInterface): Response
    {
        $pub = $em->getRepository(Club::class)->findAll();
        
        $json=$serializerInterface->serialize($pub,'json',['groups'=>'Club']);
        return new Response($json);
    }


    /**
     * @Route("/registerPublicite", name="registerPublicite")
     */
    public function registerPublicite( Request $request,SerializerInterface $serializer,EntityManagerInterface $manager){
        $Pub = new Publicite();


        $Pub->setNomPub($request->query->get("Nom"));
        $Pub->setDescription($request->query->get("Description"));
        $Pub->setImage($request->query->get("Image"));

        $Sponsor=$manager->getRepository(Communaute::class)->findOneBy(array('id'=>$request->query->get("id_Communaute")));
        $Pub->setIdSponsor($Sponsor);
        $manager->persist($Pub);
        $manager->flush();
        $json=$serializer->serialize($Pub,'json',['groups'=>'Communaute']);
        return new Response($json);
    }


    /**
     * @Route("/updatePublicite", name="updatePublicite")
     */
    public function updatePublicite( Request $request,serializerInterface $serializer,EntityManagerInterface $entityManager)
        {
            $Pub = new Club();
            $Pub=$entityManager->getRepository(Club::class)->findOneBy(array('id'=>$request->query->get("id")));
            $Pub->setNomPub($request->query->get("Nom"));
            $Pub->setDescription($request->query->get("Description"));
            $Pub->setImage($request->query->get("Image"));
            $entityManager->persist($Pub);
            $entityManager->flush();

            return new Response("success");

        }

    
        
    /**
* @Route("/deletePublicitejson", name="deletePublicitejson")
*/
public function deletePubliciteee( 
    Request $request,
    serializerInterface $serializer,
    EntityManagerInterface $entityManager
){

$Pub=$entityManager->getRepository(Club::class)->findOneBy(array('id'=>$request->query->get("id")));

$entityManager->remove($Pub);
$entityManager->flush();
return new Response("success");

}










}

