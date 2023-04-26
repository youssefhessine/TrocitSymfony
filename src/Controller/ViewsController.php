<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ViewsController extends AbstractController
{
    #[Route('/views', name: 'app_views')]
    public function index(): Response
    {
        return $this->render('views/index.html.twig', [
            'controller_name' => 'ViewsController',
        ]);
    }
}
