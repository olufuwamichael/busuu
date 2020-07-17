<?php

namespace App\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Busuu\Service\LevelAssessmentService;
use Busuu\Entity\Exercise;

class LevelAssessmentServiceTest extends TestCase
{
    /**
     * Given the results, user should be graded "A2"
     */
    public function testEvaluationCompleteUnchangedLevel()
    {
        $placementTestService = new LevelAssessmentService();

        $result = $placementTestService->calculateLevel($this->exercisesUnchangedLevelsDataset());

        $this->assertEquals('A2', $result);
    }

    /**
     * Given the results, user should be graded "B1"
     */
    public function testEvaluationCompleteMaxSetsLevel()
    {
        $placementTestService = new LevelAssessmentService();

        $result = $placementTestService->calculateLevel($this->exercisesMaxSetsDataset());

        $this->assertEquals('B1', $result);
    }

    /**
     * Given the results, user should be graded "B1"
     */
    public function testEvaluationCompleteLevelB1()
    {
        $placementTestService = new LevelAssessmentService();

        $result = $placementTestService->calculateLevel($this->exercisesDataProviderSetB1());

        $this->assertEquals('B1', $result);
    }

    /**
     * Given the results, user should be graded "B2"
     */
    public function testEvaluationCompleteLevelB2()
    {
        $placementTestService = new LevelAssessmentService();

        $result = $placementTestService->calculateLevel($this->exercisesDataProviderSetB2());

        $this->assertEquals('B2', $result);
    }

    /**
     * Given the results, user should be graded "C1"
     */
    public function testEvaluationCompleteLevelC1()
    {
        $placementTestService = new LevelAssessmentService();

        $result = $placementTestService->calculateLevel($this->exercisesDataProviderSetC1());

        $this->assertEquals('C1', $result);
    }

    /**
     * @return array
     */
    private function exercisesUnchangedLevelsDataset(): array
    {
        return [
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
        ];
    }

    /**
     * @return array
     */
    private function exercisesMaxSetsDataset(): array
    {
        return [
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(false)
        ];
    }

    /**
     * @return array
     */
    private function exercisesDataProviderSetB1(): array
    {
        return [
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true)
        ];
    }

    /**
     * @return array
     */
    private function exercisesDataProviderSetB2(): array
    {
        return [
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(false),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(false)
        ];
    }

    /**
     * @return array
     */
    private function exercisesDataProviderSetC1(): array
    {
        return [
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true),
            (new Exercise())->setPassed(true)
        ];
    }
}
