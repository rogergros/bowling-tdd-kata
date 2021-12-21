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
}
