<?php
namespace App\Process\StateEventHandlers\Registry;

use App\Base\Enums\Processes\EventNames\EventName;
use App\Base\Enums\Processes\ProcessName;
use App\Base\Enums\Processes\States\AbstractProcessState;
use App\Base\Utils\NameConverterInterface;
use App\Process\StateEventHandlers\AbstractStateEventHandler;
use App\Process\StateEventHandlers\Registry\Processes\AccessStateEventHandlerRegistry;
use App\Process\StateEventHandlers\Registry\Processes\CompletionStateEventHandlerRegistry;
use App\Process\StateEventHandlers\Registry\Processes\PoiStateEventHandlerRegistry;
use App\Process\StateEventHandlers\Registry\Processes\ScenarioStateEventHandlerRegistry;
use App\Process\StateEventHandlers\Registry\Processes\StepStateEventHandlerRegistry;

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
            ProcessName::SCENARIO => $scenarioStateEventHandlerRegistry->getStateEventHandlers(),
            ProcessName::ACCESS => $accessStateEventHandlerRegistry->getStateEventHandlers(),
            ProcessName::COMPLETION => $completionStateEventHandlerRegistry->getStateEventHandlers(),
            ProcessName::POI => $poiStateEventHandlerRegistry->getStateEventHandlers(),
            ProcessName::STEP => $stepStateEventHandlerRegistry->getStateEventHandlers(),
        ];
    }

    /**
     * @param ProcessName $processName
     * @param AbstractProcessState $processState
     * @param EventName $eventName
     * @return callable
     */
    public function get(ProcessName $processName, AbstractProcessState $processState, EventName $eventName): callable
    {
        $handlerObject = $this->stateEventHandlers[$processName->getValue()][$processState->getValue()];
        $eventNameValue = $eventName->getValue();
        $eventNameValueUnderscoresOnly = str_replace('.', '_', $eventNameValue);
        $handlerMethod =
            'on'
            . $this->nameConverter->denormalize(ucfirst($eventNameValueUnderscoresOnly))
        ;

        return [$handlerObject, $handlerMethod];
    }

}
