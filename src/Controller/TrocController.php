<?php

namespace App\Controller;

use App\Entity\Troc;
use App\Repository\TrocRepository;
use App\Form\TrocType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Joli\JoliNotif\Notification;
use Joli\JoliNotif\NotifierFactory;
use Knp\Component\Pager\PaginatorInterface; // Nous appelons le bundle KNP Paginator
 

#[Route('/troc')]
class TrocController extends AbstractController
{

    #[Route('/front', name: 'display_front', methods: ['GET'])]
    public function indexAdmin(): Response
    {

        return $this->render('troc/showFront.html.twig');
    }

    #[Route('/', name: 'app_troc_index', methods: ['GET'])]
    public function index(TrocRepository $trocRepository , Request $request , PaginatorInterface $paginator): Response
    { 
                { $troc = $trocRepository->findAll();
                 $troc = $paginator->paginate(
                    $troc,
                    $request->query->getInt('page',1),6
                 );}
                 
        return $this->render('troc/index.html.twig', [
            'trocs' => $troc,
            
        ]);
    }

    #[Route('/new', name: 'app_troc_new', methods: ['GET', 'POST'])]
    public function new(Request $request, TrocRepository $trocRepository): Response
    {
        $troc = new Troc();
        $form = $this->createForm(TrocType::class, $troc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trocRepository->save($troc, true);
            // Create a Notifier
$notifier = NotifierFactory::create();

// Create your notification
$notification =
    (new Notification())
    ->setTitle('Troc Ajouté')
    ->setBody('Votre demande de troc est ajouté avec success')
    
;

// Send it
$notifier->send($notification);

            return $this->redirectToRoute('app_troc_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('troc/new.html.twig', [
            'troc' => $troc,
            'form' => $form,
        ]);
    }


    #[Route('/newtroc', name: 'app_troc_newtroc', methods: ['GET', 'POST'])]
    public function newtroc(Request $request, TrocRepository $trocRepository): Response
    {
        $troc = new Troc();
        $form = $this->createForm(TrocType::class, $troc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trocRepository->save($troc, true);
            // Create a Notifier
$notifier = NotifierFactory::create();

// Create your notification
$notification =
    (new Notification())
    ->setTitle('Troc Ajouté')
    ->setBody('Votre demande de troc est ajouté avec success')
    
;

// Send it
$notifier->send($notification);
echo '<script>closeWindow();</script>';
        }

        return $this->renderForm('troc/new.html copy.twig', [
            'troc' => $troc,
            'form' => $form,
        ]);
    }
    #[Route('/{idTroc}', name: 'app_troc_show', methods: ['GET'])]
    public function show(Troc $troc): Response
    {
        return $this->render('troc/show.html.twig', [
            'troc' => $troc,
        ]);
    }

    #[Route('/{idTroc}/edit', name: 'app_troc_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Troc $troc, TrocRepository $trocRepository): Response
    {
        $form = $this->createForm(TrocType::class, $troc);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $trocRepository->save($troc, true);

            return $this->redirectToRoute('app_troc_index', [], Response::HTTP_SEE_OTHER);
        }
        return $this->renderForm('troc/edit.html.twig', [
            'troc' => $troc,
            'form' => $form,
        ]);
    }

    #[Route('/{idTroc}', name: 'app_troc_delete', methods: ['POST'])]
    public function delete(Request $request, Troc $troc, TrocRepository $trocRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$troc->getIdTroc(), $request->request->get('_token'))) {
            $trocRepository->remove($troc, true);
        }

        return $this->redirectToRoute('app_troc_index', [], Response::HTTP_SEE_OTHER);
    }
}
