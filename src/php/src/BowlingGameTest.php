<?php

declare(strict_types=1);

namespace TDD;

use PHPUnit\Framework\TestCase;

class BowlingGameTest extends TestCase
{
    private BowlingGame $game;

    public function setUp(): void
    {
        $this->game = new BowlingGame();
    }

    public function testScoreWithNoThrows(): void
    {
        $score = $this->game->score();

        $this->assertEquals(0, $score);
    }

    public function testScoreWithOneThrowAndNoMark(): void
    {
        $this->game->roll(5);
        $score = $this->game->score();

        $this->assertEquals(5, $score);
    }

    public function testScoreWithTwoThrowsAndNoMark(): void
    {
        $this->game->roll(3);
        $this->game->roll(4);
        $score = $this->game->score();

        $this->assertEquals(7, $score);
    }

    public function testScoreWithFourThrowsAndNoMark(): void
    {
        $this->game->roll(5);
        $this->game->roll(4);
        $this->game->roll(7);
        $this->game->roll(2);
        $score = $this->game->score();

        $this->assertEquals(18, $score);
    }
}
