<?php
namespace App\Process\HandlerRegistry\Registries;

use App\Base\Enums\ProcessStates\ScenarioState;
use App\Process\StateEventHandlers\AbstractStateEventHandler;
use App\Process\StateEventHandlers\Workflow\FinishedHandler;
use App\Process\StateEventHandlers\Workflow\IntroSentHandler;
use App\Process\StateEventHandlers\Workflow\StartedHandler;

class ScenarioStateEventHandlerRegistry extends AbstractProcessStateEventHandlerRegistry
{

    /** @var AbstractStateEventHandler[] */
    private $stateEventHandlers;

    public function __construct(
        StartedHandler $startedHandler,
        IntroSentHandler $poiProcessingHandler,
        FinishedHandler $finishedHandler
    ) {
        $this->stateEventHandlers = [
            ScenarioState::STARTED => $startedHandler,
            ScenarioState::POI_PROCESSING => $poiProcessingHandler,
            ScenarioState::FINISHED => $finishedHandler,
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
