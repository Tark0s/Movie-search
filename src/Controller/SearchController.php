<?php

namespace App\Controller;

use App\Service\MoviesService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class SearchController extends AbstractController
{
    #[Route('/', name: 'search')]
    public function index(MoviesService $moviesService, Request $request)
    {
        $param = $request->query->get('param');

        $movies = match ($param) {
            'random' => $moviesService->getRandomMovies(3),
            'evenWithW' => $moviesService->getEvenLengthTitlesWithW(),
            'moreThan1Word' => $moviesService->getMultiWordTitles(),
            default => [],
        };

        if ($request->query->has('param')){
            return $this->render('search/result.html.twig',
                ['movies' => $movies]
            );
        }

        return $this->render('search/index.html.twig');
    }

}