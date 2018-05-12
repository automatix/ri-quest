<?php
namespace App\Services\Process\Internal;

use App\Base\Enums\Processes\ProcessName;
use App\Base\Enums\Processes\States\AccessState;
use App\Base\Enums\Processes\States\CompletionState;
use App\Base\Enums\Processes\States\PoiState;
use App\Base\Enums\Processes\States\ScenarioState;
use App\Base\Enums\Processes\States\StepState;
use App\Services\Process\StateManagingServiceInterface;

/**
 * @package App\Services\Process\Internal
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class StateManagingService implements StateManagingServiceInterface
{

    public function detectProcessState(ProcessName $processName)
    {
        $processState = null;
        switch ($processName) {
            case ProcessName::SCENARIO():
                $processState = $this->detectScenarioState();
                break;
            case ProcessName::POI():
                $processState = $this->detectPoiState();
                break;
            case ProcessName::STEP():
                $processState = $this->detectStepState();
                break;
            case ProcessName::ACCESS():
                $processState = $this->detectAccessState();
                break;
            case ProcessName::COMPLETION():
                $processState = $this->detectCompletionState();
                break;
        }
        return $processState;
    }

    private function detectScenarioState()
    {
        return ScenarioState::STARTED();
    }

    private function detectPoiState()
    {
        return PoiState::STARTED();
    }

    private function detectStepState()
    {
        return StepState::STARTED();
    }

    private function detectAccessState()
    {
        return AccessState::STARTED();
    }

    private function detectCompletionState()
    {
        return CompletionState::STARTED();
    }

    /**
     * @inheritdoc
     */
    public function detectFullState()
    {
        return null;
    }

}
