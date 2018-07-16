<?php
namespace App\Process\HandlerRegistry;

use App\Base\Enums\EventNames\GeneralEventName;
use App\Base\Enums\ProcessName;
use App\Base\Enums\ProcessStates\AbstractProcessState;
use App\Base\Exceptions\EventHandlingErrorContextCode;
use App\Base\Exceptions\EventHandlingException;
use App\Base\Utils\NameConverterInterface;
use App\Process\HandlerRegistry\Registries\WorkflowStateEventHandlerRegistry;
use App\Process\StateEventHandlers\AbstractStateEventHandler;
use App\Process\HandlerRegistry\Registries\AccessStateEventHandlerRegistry;
use App\Process\HandlerRegistry\Registries\CompletionStateEventHandlerRegistry;
use App\Process\HandlerRegistry\Registries\PoiStateEventHandlerRegistry;
use App\Process\HandlerRegistry\Registries\ScenarioStateEventHandlerRegistry;
use App\Process\HandlerRegistry\Registries\StepStateEventHandlerRegistry;

class StateEventHandlerRegistry implements StateEventHandlerRegistryInterface
{

    /** @var NameConverterInterface $nameConverter */
    private $nameConverter;
    /** @var AbstractStateEventHandler[] */
    private $stateEventHandlers;

    public function __construct(
        NameConverterInterface $nameConverter,
        AccessStateEventHandlerRegistry $accessStateEventHandlerRegistry,
        CompletionStateEventHandlerRegistry $completionStateEventHandlerRegistry,
        PoiStateEventHandlerRegistry $poiStateEventHandlerRegistry,
        StepStateEventHandlerRegistry $stepStateEventHandlerRegistry,
        ScenarioStateEventHandlerRegistry $scenarioStateEventHandlerRegistry,
        WorkflowStateEventHandlerRegistry $workflowStateEventHandlerRegistry
    ) {
        $this->nameConverter = $nameConverter;
        $this->stateEventHandlers = [
            ProcessName::ACCESS => $accessStateEventHandlerRegistry->getStateEventHandlers(),
            ProcessName::COMPLETION => $completionStateEventHandlerRegistry->getStateEventHandlers(),
            ProcessName::POI => $poiStateEventHandlerRegistry->getStateEventHandlers(),
            ProcessName::SCENARIO => $scenarioStateEventHandlerRegistry->getStateEventHandlers(),
            ProcessName::STEP => $stepStateEventHandlerRegistry->getStateEventHandlers(),
            ProcessName::WORKFLOW => $workflowStateEventHandlerRegistry->getStateEventHandlers(),
        ];
    }

    /**
     * @param ProcessName $processName
     * @param AbstractProcessState $processState
     * @param string $eventName
     * @return callable
     * @throws EventHandlingException
     */
    public function get(ProcessName $processName, AbstractProcessState $processState, string $eventName): callable
    {
        if (isset($this->stateEventHandlers[$processName->getValue()][$processState->getValue()])) {
            $handlerObject = $this->stateEventHandlers[$processName->getValue()][$processState->getValue()];
        } else {
            throw new EventHandlingException('', EventHandlingErrorContextCode::NO_STATE_HANDLER_FOUND());
        }
        $soughtHandler = $this->getObjectMethodHandlerPair($handlerObject, $eventName);
        if (! is_callable($soughtHandler)) {
            throw new EventHandlingException('', EventHandlingErrorContextCode::NO_STATE_EVENT_HANDLER_FOUND());
        }
        return $soughtHandler;
    }

    /**
     * @param string $eventName
     * @param $handlerObject
     * @return array
     */
    private function getObjectMethodHandlerPair(AbstractStateEventHandler $handlerObject, string $eventName)
    {
        $eventNameUnderscoresOnly = str_replace(['.', ':'], '_', $eventName);
        $handlerMethod = 'on' . ucfirst($this->nameConverter->denormalize($eventNameUnderscoresOnly));
        return [$handlerObject, $handlerMethod];

    }

}
