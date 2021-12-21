<?php

declare(strict_types=1);

namespace TDD;

class BowlingGame
{
    /** @var int[] */
    private array $rolls = [];

    public function roll(int $numberOfKnockedPins): void
    {
        $this->rolls[] = $numberOfKnockedPins;
    }

    public function score(): int
    {
        $score = 0;
        for ($frame = 1; $frame <= 10; ++$frame) {
            $frameFirstBallNumber = 0 + ($frame - 1) * 2;
            $frameSecondBallNumber = 1 + (($frame - 1) * 2);

            $firstBallKnockedPins = $this->rolls[$frameFirstBallNumber] ?? 0;
            $secondBallKnockedPins = $this->rolls[$frameSecondBallNumber] ?? 0;

            $frameScore = $firstBallKnockedPins + $secondBallKnockedPins;

            if ($frameScore === 10) {
                $frameScore += $this->rolls[$frameSecondBallNumber + 1] ?? 0;
            }

            $score += $frameScore;
        }

        return $score;
    }
}
