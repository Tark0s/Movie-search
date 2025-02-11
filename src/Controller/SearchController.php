<?php

namespace App\Controller;

use App\Enum\MoviesParamEnum;
use App\Service\MoviesServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SearchController extends AbstractController
{
    #[Route('/', name: 'search', methods: ['GET'])]
    public function index(MoviesServiceInterface $moviesService, Request $request): Response
    {
        $param = MoviesParamEnum::tryFrom($request->query->get('param'));

        $movies = match ($param) {
            MoviesParamEnum::RANDOM => $moviesService->getRandomMovies(3),
            MoviesParamEnum::EVEN_WITH_W => $moviesService->getEvenLengthTitlesWithW(),
            MoviesParamEnum::MORE_THAN_ONE_WORD => $moviesService->getMultiWordTitles(),
            null => [],
        };

        return $this->render(
            $param !== null ? 'search/result.html.twig' : 'search/index.html.twig',
            ['movies' => $movies]
        );
    }

}