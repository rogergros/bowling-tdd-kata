<?php

declare(strict_types=1);

namespace TDD;

use PHPUnit\Framework\TestCase;

class BowlingGameTest extends TestCase
{
    public function testScoreWithNoThrows(): void
    {
        $game = new BowlingGame();
        $score = $game->score();

        $this->assertEquals(0, $score);
    }

    public function testScoreWithOneThrowAndNoMark(): void
    {
        $game = new BowlingGame();
        $game->roll(5);
        $score = $game->score();

        $this->assertEquals(5, $score);
    }

    public function testScoreWithTwoThrowsAndNoMark(): void
    {
        $game = new BowlingGame();
        $game->roll(3);
        $game->roll(4);
        $score = $game->score();

        $this->assertEquals(7, $score);
    }

    public function testScoreWithFourThrowsAndNoMark(): void
    {
        $game = new BowlingGame();
        $game->roll(5);
        $game->roll(4);
        $game->roll(7);
        $game->roll(2);
        $score = $game->score();

        $this->assertEquals(18, $score);
    }
}
