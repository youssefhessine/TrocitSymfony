<?php

// src/Controller/WeatherController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Cmfcmf\OpenWeatherMap\OpenWeatherMap;

class WeatherController extends AbstractController
{
    /**
     * @Route("/weather/{location}", name="weather")
     */
    public function index(OpenWeatherMap $openWeatherMap, string $location): Response
    {
        $weather = $openWeatherMap->getWeather($location);

        return $this->render('weather/index.html.twig', [
            'weather' => $weather,
        ]);
    }
}
