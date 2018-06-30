<?php
namespace App\Services\Process\Internal;

use App\Base\Enums\ProcessName;
use App\Base\Enums\ProcessStates\AccessState;
use App\Base\Enums\ProcessStates\CompletionState;
use App\Base\Enums\ProcessStates\PoiState;
use App\Base\Enums\ProcessStates\ScenarioState;
use App\Base\Enums\ProcessStates\StepState;
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
        // @todo remove the static dummy return value and implement the method!
        return ScenarioState::STARTED();
    }

    private function detectPoiState()
    {
        // @todo remove the static dummy return value and implement the method!
        return PoiState::STARTED();
    }

    private function detectStepState()
    {
        // @todo remove the static dummy return value and implement the method!
        return StepState::STARTED();
    }

    private function detectAccessState()
    {
        // @todo remove the static dummy return value and implement the method!
        return AccessState::STARTED();
    }

    private function detectCompletionState()
    {
        // @todo remove the static dummy return value and implement the method!
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
