<?php

namespace App\Service;

class MoviesService implements MoviesServiceInterface
{
    private array $movies;

    public function __construct()
    {
        $this->movies = require __DIR__ . '/../../config/movies.php';
    }

    public function getRandomMovies(int $limit = 1): array
    {
        $randomIndexes = array_rand($this->movies, $limit);

        return array_map(fn($index) => $this->movies[$index], $randomIndexes);
    }

    public function getEvenLengthTitlesWithW(): array
    {
        return array_values(array_filter($this->movies, function ($title) {
            return mb_stripos($title, 'w') !== false && mb_strlen($title) % 2 === 0;
        }));
    }

    public function getMultiWordTitles(): array
    {
        return array_values(array_filter($this->movies, fn($title) => str_contains($title, ' ')));
    }
}
