<?php

// src/Controller/LivreurController.php
namespace App\Controller;

use App\Repository\LivraisonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class LivreurController extends AbstractController
{
    public function livreurStats(LivraisonRepository $livraisonRepository): Response
    {
        // Récupérer les données des livraisons depuis la base de données
        $livraisons = $livraisonRepository->findAll();

        // Initialiser un tableau pour stocker les statistiques de chaque livreur
        $livreurStats = [];

        // Parcourir les livraisons et calculer les statistiques de chaque livreur
foreach ($livraisons as $livraison) {
    $livreur = $livraison->getIdLivreur();
    
    if (is_object($livreur)) {
        $livreur = $livreur->getId();
    }

    if (!isset($livreurStats[$livreur])) {
        $livreurStats[$livreur] = 0;
    }

    $livreurStats[$livreur]++;
}


        // Trouver le livreur ayant effectué le plus de livraisons
        $livreurMaxLivraisons = array_search(max($livreurStats), $livreurStats);

        // Afficher la vue avec les statistiques du livreur
        return $this->render('livreur/stats.html.twig', [
            'livreurMaxLivraisons' => $livreurMaxLivraisons,
            'livreurStats' => $livreurStats,
        ]);
    }
}
