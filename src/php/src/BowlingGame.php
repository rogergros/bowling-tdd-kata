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
        $frame = 1;
        $roll = 0;

        while ($frame <= 10) {
            $frameFirstRollKnockedPins = $this->rolls[$roll] ?? 0;

            if ($frameFirstRollKnockedPins === 10) {
                $firstFollowingRollKnockedPins = $this->rolls[$roll + 1] ?? 0;
                $secondFollowingRollKnockedPins = $this->rolls[$roll + 2] ?? 0;

                $score += $frameFirstRollKnockedPins + $firstFollowingRollKnockedPins + $secondFollowingRollKnockedPins;
                $roll += 1;
                ++$frame;
                continue;
            }

            $frameSecondRollKnockedPins = $this->rolls[$roll + 1] ?? 0;

            if (($frameFirstRollKnockedPins + $frameSecondRollKnockedPins) === 10) {
                $firstFollowingRollKnockedPins = $this->rolls[$roll + 2] ?? 0;

                $score += $frameFirstRollKnockedPins + $frameSecondRollKnockedPins + $firstFollowingRollKnockedPins;

                $roll += 2;
                ++$frame;
                continue;
            }

            $score += $frameFirstRollKnockedPins + $frameSecondRollKnockedPins;
            $roll += 2;
            ++$frame;
        }

        return $score;
    }
}
