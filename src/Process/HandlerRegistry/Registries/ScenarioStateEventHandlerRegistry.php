<?php
namespace App\Process\HandlerRegistry\Registries;

use App\Base\Enums\ProcessStates\ScenarioState;
use App\Process\StateEventHandlers\AbstractStateEventHandler;
use App\Process\HandlerRegistry\Registries\AbstractProcessStateEventHandlerRegistry;
use App\Process\StateEventHandlers\Workflow\Scenario\AccessFailedHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\AccessProcessingHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\CompletedHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\EndedHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\FinishedHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\PausedHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\PlayingHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\StartedHandler;

class ScenarioStateEventHandlerRegistry extends AbstractProcessStateEventHandlerRegistry
{

    /** @var AbstractStateEventHandler[] */
    private $stateEventHandlers;

    public function __construct(
        StartedHandler $startedHandler,
        PlayingHandler $playingHandler,
        CompletedHandler $completedHandler,
        FinishedHandler $finishedHandler,
        PausedHandler $pausedHandler,
        EndedHandler $endedHandler,
        AccessFailedHandler $accessFailedHandler,
        AccessProcessingHandler $accessProcessingHandler
    ) {
        $this->stateEventHandlers = [
            ScenarioState::STARTED => $startedHandler,
            ScenarioState::PLAYING => $playingHandler,
            ScenarioState::PAUSED => $pausedHandler,
            ScenarioState::COMPLETED => $completedHandler,
            ScenarioState::ENDED => $endedHandler,
            ScenarioState::ACCESS_FAILED => $accessFailedHandler,
            ScenarioState::ACCESS_PROCESSING => $accessProcessingHandler,
        ];
    }

    /**
     * @return array
     */
    public function getStateEventHandlers() : array
    {
        return $this->stateEventHandlers;
    }

}
