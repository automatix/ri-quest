<?php
namespace App\Process\HandlerRegistry;

use App\Base\Enums\Processes\EventNames\EventName;
use App\Base\Enums\Processes\ProcessName;
use App\Base\Enums\Processes\States\AbstractProcessState;
use App\Base\Exceptions\EventHandlingErrorContextCode;
use App\Base\Exceptions\EventHandlingException;
use App\Base\Utils\NameConverterInterface;
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
        ScenarioStateEventHandlerRegistry $scenarioStateEventHandlerRegistry,
        AccessStateEventHandlerRegistry $accessStateEventHandlerRegistry,
        CompletionStateEventHandlerRegistry $completionStateEventHandlerRegistry,
        PoiStateEventHandlerRegistry $poiStateEventHandlerRegistry,
        StepStateEventHandlerRegistry $stepStateEventHandlerRegistry
    ) {
        $this->nameConverter = $nameConverter;
        $this->stateEventHandlers = [
            ProcessName::STEP => $stepStateEventHandlerRegistry->getStateEventHandlers(),
            ProcessName::POI => $poiStateEventHandlerRegistry->getStateEventHandlers(),
            ProcessName::ACCESS => $accessStateEventHandlerRegistry->getStateEventHandlers(),
            ProcessName::COMPLETION => $completionStateEventHandlerRegistry->getStateEventHandlers(),
            ProcessName::SCENARIO => $scenarioStateEventHandlerRegistry->getStateEventHandlers(),
        ];
    }

    /**
     * @param ProcessName $processName
     * @param AbstractProcessState $processState
     * @param EventName $eventName
     * @return callable
     * @throws EventHandlingException
     */
    public function get(ProcessName $processName, AbstractProcessState $processState, EventName $eventName): callable
    {
        if (isset($this->stateEventHandlers[$processName->getValue()][$processState->getValue()])) {
            $handlerObject = $this->stateEventHandlers[$processName->getValue()][$processState->getValue()];
        } else {
            throw new EventHandlingException('', EventHandlingErrorContextCode::NO_STATE_HANDLER_FOUND());
        }
        $eventNameValue = $eventName->getValue();
        $eventNameValueUnderscoresOnly = str_replace('.', '_', $eventNameValue);
        $handlerMethod =
            'on'
            . ucfirst($this->nameConverter->denormalize($eventNameValueUnderscoresOnly))
        ;
        $stateEventHandler = [$handlerObject, $handlerMethod];
        if (! is_callable($stateEventHandler)) {
            throw new EventHandlingException('', EventHandlingErrorContextCode::NO_STATE_EVENT_HANDLER_FOUND());
        }
        return $stateEventHandler;
    }

}
