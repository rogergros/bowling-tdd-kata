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

    public function testSpare(): void
    {
        $this->game->roll(3);
        $this->game->roll(7);
        $this->game->roll(3);
        $this->game->roll(2);
        $score = $this->game->score();

        $this->assertEquals(18, $score);
    }

    public function testStrike(): void
    {
        $this->game->roll(10);
        $this->game->roll(5);
        $this->game->roll(2);
        $score = $this->game->score();

        $this->assertEquals(24, $score);
    }

    public function testPerfectGame(): void
    {
        for ($i = 0; $i < 12; ++$i) {
            $this->game->roll(10);
        }
        $score = $this->game->score();

        $this->assertEquals(300, $score);
    }

    public function testNearlyPerfectGame(): void
    {
        for ($i = 0; $i < 11; ++$i) {
            $this->game->roll(10);
        }
        $this->game->roll(9);
        $score = $this->game->score();

        $this->assertEquals(299, $score);
    }

    public function testSampleGame(): void
    {
        $this->game->roll(1);
        $this->game->roll(4);
        $this->game->roll(4);
        $this->game->roll(5);
        $this->game->roll(6);
        $this->game->roll(4);
        $this->game->roll(5);
        $this->game->roll(5);
        $this->game->roll(10);
        $this->game->roll(0);
        $this->game->roll(1);
        $this->game->roll(7);
        $this->game->roll(3);
        $this->game->roll(6);
        $this->game->roll(4);
        $this->game->roll(10);
        $this->game->roll(2);
        $this->game->roll(8);
        $this->game->roll(6);
        $score = $this->game->score();

        $this->assertEquals(133, $score);
    }

    public function testTenthFrameSpare(): void
    {
        for ($i = 0; $i < 9; ++$i) {
            $this->game->roll(10);
        }
        $this->game->roll(9);
        $this->game->roll(1);
        $this->game->roll(1);
        $score = $this->game->score();

        $this->assertEquals(270, $score);
    }
}
