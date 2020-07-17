<?php

namespace Busuu\Service;

use Busuu\Entity\Exercise;

class LevelAssessmentService implements LevelAssessmentServiceInterface
{
    const LEVELS = [ 'A1', 'A2', 'B1', 'B2', 'C1', 'C2' ];

    const RULES = [
        0 => -1,
        1 => 0,
        2 => +1,
        3 => +2
    ];

    /**
     * @param array $exercises
     * @return string|bool
     */
    public function calculateLevel(array $exercises)
    {
        $levelIndex = 0;
        $consecutiveSetCount = 0;

        // Check if enough exercises have been submitted
        if (count($exercises) <= 3) {
            return false;
        }

        // Create sets of 3
        $exerciseSets = array_chunk($exercises, 3);

        foreach ($exerciseSets as $key => $exerciseSet) {
            // Evaluate the points for each exercise set
            $points = $this->evaluateExerciseSet($exerciseSet);

            // Update the consecutive set count
            $consecutiveSetCount = ($points === 1) ? ($consecutiveSetCount + 1) : 0;

            // Update the current level using the points and the rules
            $levelIndex = $levelIndex + self::RULES[$points];

            // Break from updating the levels when the sets are greater than 5 or the consecutive set count is the same
            if ($key >= 4 || $consecutiveSetCount > 1) {
                break;
            }
        }

        return $this->getCurrentLevelFromIndex($levelIndex);
    }

    /**
     * Calculate the points per Exercise Set
     *
     * @param Exercise[] $exerciseSet
     * @return int
     */
    public function evaluateExerciseSet(array $exerciseSet)
    {
        $points = 0;

        foreach ($exerciseSet as $exercise) {
            if ($exercise->isPassed()) {
                $points = $points + 1;
            }
        }

        return $points;
    }

    /**
     * Calculates the exercise levels given the index
     *
     * @param int $index
     * @return string
     */
    private function getCurrentLevelFromIndex(int $index)
    {
        $levels = self::LEVELS;

        switch ($index) {
            case 0:
            case 1:
            case 2:
            case 3:
            case 4:
            case 5:
                $level = $levels[$index];
                break;
            case ($index < 1):
                $level = reset($levels);
                break;
            default:
                $level = end($levels);
                break;
        }

        return $level;
    }
}
