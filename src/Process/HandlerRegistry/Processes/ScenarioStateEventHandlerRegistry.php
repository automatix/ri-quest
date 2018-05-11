<?php
namespace App\Process\HandlerRegistry\Processes;

use App\Base\Enums\Processes\States\ScenarioState;
use App\Process\StateEventHandlers\AbstractStateEventHandler;
use App\Process\HandlerRegistry\Processes\AbstractProcessStateEventHandlerRegistry;
use App\Process\StateEventHandlers\Scenario\AccessFailedHandler;
use App\Process\StateEventHandlers\Scenario\AccessProcessingHandler;
use App\Process\StateEventHandlers\Scenario\CompletedHandler;
use App\Process\StateEventHandlers\Scenario\EndedHandler;
use App\Process\StateEventHandlers\Scenario\FinishedHandler;
use App\Process\StateEventHandlers\Scenario\PausedHandler;
use App\Process\StateEventHandlers\Scenario\PlayingHandler;
use App\Process\StateEventHandlers\Scenario\StartedHandler;

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
