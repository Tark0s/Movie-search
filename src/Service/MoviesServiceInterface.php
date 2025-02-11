<?php

namespace App\Service;

interface MoviesServiceInterface
{
    public function getRandomMovies(int $limit = 1): array;
    public function getEvenLengthTitlesWithW(): array;
    public function getMultiWordTitles(): array;
}