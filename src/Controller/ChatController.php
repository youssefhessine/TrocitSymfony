<?php

namespace App\Controller;

use Sun\Contract\Country;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
#[Route('/troc')]
class ChatController extends AbstractController
{
    #[Route('/bot', name: 'app_bot')]
    public function index(Request $request): Response
    {
       $a = "fdg";
      
    
         
    $qa = [
        'Bonjour' => 'Bonjour ! Comment puis-je vous aider ?',
        'Livraison' => 'Oui tous les produits sont livrés par nos livreurs qui travaille 24/24 et 7/7',
        'Expertise' => 'Vous pouvez demandez un avis d un expert a tout moment',
        'Quel temps fait-il aujourd\'hui ?' => 'Je suis désolé, je ne suis pas capable de répondre à cette question pour le moment.',
        'fb'=>$a,
       
        'Quelles sont les offres des trocs disponibles ?' => 'Tu peux consulter ce nos categories pour voir tous les offres disponibles',
    ];
    $message = $request->request->get('message');
    if (array_key_exists($message, $qa)) {
        $response = $qa[$message];
    } else {
        $response = 'Je suis désolé, je n\'ai pas compris votre question.';
    }
    return $this->render('bot/index.html.twig', [
        'response' => $response
    ]);

}}