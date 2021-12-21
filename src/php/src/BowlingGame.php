<?php

declare(strict_types=1);

namespace TDD;

class BowlingGame
{
    private int $knockedPins = 0;

    public function roll(int $numberOfKnockedPins) : void {
        $this->knockedPins += $numberOfKnockedPins;
    }

    public function score() : int {
        return $this->knockedPins;
    }
}
