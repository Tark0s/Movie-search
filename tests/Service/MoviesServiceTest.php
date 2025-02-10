<?php

namespace App\Tests\Service;

use App\Service\MoviesService;
use PHPUnit\Framework\TestCase;

class MoviesServiceTest extends TestCase
{
    private array $movies;

    private MoviesService $moviesService;

    protected function setUp(): void
    {
        $this->movies = require __DIR__ . '/../../config/movies.php';
        $this->moviesService = new MoviesService();
    }

    public function testGetRandomTitles()
    {
        $moviesAmount = 3;

        $result = $this->moviesService->getRandomMovies($moviesAmount);

        $this->assertIsArray($result);
        $this->assertLessThanOrEqual($moviesAmount, count($result));
        $this->assertCount(count(array_unique($result)), $result);

        foreach ($result as $title) {
            $this->assertContains($title, $this->movies);
        }
    }

    public function testGetEvenLengthTitlesWithW()
    {
        $result = $this->moviesService->getEvenLengthTitlesWithW();

        $this->assertIsArray($result);
        foreach ($result as $title) {
            $this->assertMatchesRegularExpression('/[Ww]/', $title);
            $this->assertTrue(mb_strlen($title) % 2 === 0);
        }
    }

    public function testGetMultiWordTitles()
    {
        $result = $this->moviesService->getMultiWordTitles();

        $this->assertIsArray($result);
        foreach ($result as $title) {
            $this->assertStringContainsString(' ', $title);
        }
    }
}
