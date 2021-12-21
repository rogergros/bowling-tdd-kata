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
        $roll = 0;

        for ($frame = 0; $frame < 10; ++$frame) {
            if ($this->frameIsStrike($roll)) {
                $score += $this->getKnockedPins($roll, 3);
                $roll += 1;
            } elseif ($this->frameIsSpare($roll)) {
                $score += $this->getKnockedPins($roll, 3);
                $roll += 2;
            } else {
                $score += $this->getKnockedPins($roll, 2);
                $roll += 2;
            }
        }

        return $score;
    }

    private function frameIsStrike(int $frameThrowIndex): bool
    {
        return
            isset($this->rolls[$frameThrowIndex])
            && $this->rolls[$frameThrowIndex] === 10;
    }

    private function frameIsSpare(int $frameThrowIndex): bool
    {
        return
            isset($this->rolls[$frameThrowIndex], $this->rolls[$frameThrowIndex + 1])
            && ($this->rolls[$frameThrowIndex] + $this->rolls[$frameThrowIndex + 1]) === 10;
    }

    private function getKnockedPins(int $throwIndex, int $numberOfThrows): int
    {
        $knockedPins = 0;
        for ($i = $numberOfThrows - 1; $i >= 0; --$i) {
            $knockedPins += $this->rolls[$throwIndex + $i] ?? 0;
        }

        return $knockedPins;
    }
}
