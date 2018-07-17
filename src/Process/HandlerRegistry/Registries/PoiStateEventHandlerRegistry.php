<?php
namespace App\Process\HandlerRegistry\Registries;

use App\Base\Enums\ProcessStates\PoiState;
use App\Process\StateEventHandlers\AbstractStateEventHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\Poi\FinishedHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\Poi\IntroSentHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\Poi\StartedHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\Poi\StepProcessingHandler;

class PoiStateEventHandlerRegistry extends AbstractProcessStateEventHandlerRegistry
{

    /** @var AbstractStateEventHandler[] */
    private $stateEventHandlers;

    public function __construct(
        StartedHandler $startedHandler,
        IntroSentHandler $introSentHandler,
        StepProcessingHandler $stepProcessingHandler,
        FinishedHandler $finishedHandler
    ) {
        $this->stateEventHandlers = [
            PoiState::STARTED => $startedHandler,
            PoiState::INTRO_SENT => $introSentHandler,
            PoiState::STEP_PROCESSING => $stepProcessingHandler,
            PoiState::FINISHED => $finishedHandler,
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
