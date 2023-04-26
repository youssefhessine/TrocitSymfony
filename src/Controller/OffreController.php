<?php

namespace App\Controller;

use App\Entity\Offre;
use App\Entity\Categorie;
use App\Form\OffreType;
use App\Repository\OffreRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
/*use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;*/
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
        return $this->render('offre/index.html.twig', [
            'offres' => $offreRepository->findAll(),
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
       // $mailMsg="hi";
        //$mailerService->sendEmail('Details for ' . $offre->getTitre());
          // mailing : 
          $transport = Transport::fromDsn('smtp://youssefhessine17:cmwerqiatcxezdsw@smtp.gmail.com:587');


$mailer = new Mailer($transport);


$email = (new Email());

$email->from('youssefhessine17@gmail.com');


$email->to(
    'trocit2023@gmail.com'

);

$email->subject('Demande de troc pour votre offre');


$email->text('The plain text version of the message.');


$email->html('
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Offer Details</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			font-size: 14px;
			line-height: 1.6;
			background-color: #f1f1f1;
			padding: 20px;
		}
		table {
			border-collapse: collapse;
			margin-top: 20px;
			margin-bottom: 20px;
			width: 100%;
		}
		 td {
			padding: 10px;
			text-align: left;
			border: 1px solid #ddd;
          
		}
		th {
			background-color: #198754;
            padding: 10px;
			text-align: left;
			border: 1px solid #ddd;
            color:white;
		}
        footer {
			margin-top: 20px;
			background-color: #198754;
			color: white;
			padding: 20px;
			text-align: center;
		}
	
	</style>
</head>
<body>
    <p>Bonjour,</p>
	<p>Nous espérons que vous allez bien. Nous vous informons qu\'un troqueur souhaite troquer avec vous pour l\'offre suivante:</p>
	<table>
		<thead>
			<tr>
				<th>Titre</th>
				<th>Type</th>
				<th>Description</th>
				<th>Date</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>'.$offre->getTitre().'</td>
				<td>'.$offre->getType().'</td>
				<td>'.$offre->getDescription().'</td>
                <td>'.date('d/m/Y H:i', strtotime($offre->getDate()->format('Y-m-d'))).'</td>
            </tr>
		</tbody>
	</table>
	<p>Cordialement,</p>
	<p>L\'équipe de Trocit</p>
    <footer>
    <p>&copy; 2023 Trocit. Tous droits réservés.</p>
</footer>
    </body>
</html>

'); 

   try {
    $mailer->send($email);
   
    return $this->render('offre/show.html.twig', [
        'offre' => $offre,
    ]);} catch (TransportExceptionInterface $e) {
        return $this->render('offre/show.html.twig', [
            'offre' => $offre,
        ]);}
      
        
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


/*function sendEmail()
{
    $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587, 'tls'))
        ->setUsername('trocitesprit2023@gmail.com')
        ->setPassword('nzllowkwnfjhtxfz');

    $mailer = new Swift_Mailer($transport);

    $message = (new Swift_Message())
        ->setSubject('New job offer: ' )
        ->setFrom(['trocitesprit2023@gmail.com' => 'Trocit'])
        ->setTo('youssefhessine17@gmail.com')
        ->setBody(
            'A new job offer has been posted on our website!' . "\n" 
           
        );

    $result = $mailer->send($message);

    return $result;
}
     
   */
  private $security;

  public function __construct(Security $security)
  {
      $this->security = $security;
  }

  public function addview(Offre $offre)
  {
      //$user = $this->security->getUser();
      $user = new User();
$user->setId(1); 
/*$user->setUsername('testuser'); // set the username
$user->setEmail('testuser@example.com'); // set the email
$user->setPassword('password'); // set the password*/
      $categorie = $offre->getNomCategorie();

      // Check if the user has already viewed this offer
      $view = $this->getDoctrine()->getRepository(Views::class)->findOneBy([
          'offre' => $offre,
          'user' => $user
      ]);

      // Add a view to the views table if the user has not already viewed this offer
      if (!$view) {
          $entityManager = $this->getDoctrine()->getManager();
          
          $newView = new Views();
          $newView->setOffre($offre);
          $newView->setUser($user);
          $newView->setNomCategorie($categorie);
          //$newView->setDate(new \DateTime());

          $entityManager->persist($newView);
          $entityManager->flush();
      }

      // Render the view
      // ...
  }


}
