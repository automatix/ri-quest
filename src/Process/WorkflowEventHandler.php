<?php
namespace App\Process;

use App\Base\Enums\ProcessName;
use App\Base\Exceptions\EventHandlingException;
use App\Process\HandlerRegistry\StateEventHandlerRegistryInterface;
use App\Services\Process\StateManagingServiceInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class WorkflowEventHandler implements WorkflowEventHandlerInterface
{

    /** @var StateManagingServiceInterface $stateManagingService */
    private $stateManagingService;
    /** @var StateEventHandlerRegistryInterface $stateEventHandlerRegistry */
    private $stateEventHandlerRegistry;

    public function __construct(StateManagingServiceInterface $stateManagingService, StateEventHandlerRegistryInterface $stateEventHandlerRegistry)
    {
        $this->stateManagingService = $stateManagingService;
        $this->stateEventHandlerRegistry = $stateEventHandlerRegistry;
    }

    /**
     * @return StateManagingServiceInterface
     */
    public function getStateManagingService(): StateManagingServiceInterface
    {
        return $this->stateManagingService;
    }

    /**
     * @return StateEventHandlerRegistryInterface
     */
    public function getEventHandlerRegistry(): StateEventHandlerRegistryInterface
    {
        return $this->stateEventHandlerRegistry;
    }

    public function handle(Event $event, string $eventName, EventDispatcherInterface $eventDispatcher)
    {
        foreach ($this->getProcessNames() as $processName) {
            $currentState = $this->getStateManagingService()->detectProcessState($processName);
            try {
                $concreteHandler = $this->getEventHandlerRegistry()->get($processName, $currentState, $eventName);
                call_user_func($concreteHandler, $event, $eventName, $eventDispatcher);
            } catch (EventHandlingException $e) {
                $breakpoint = null;
                // do nothing...
            }
        }
    }

    private function getProcessNames()
    {
        // The array index determines the priority and so the handling order!
        // Means: The the order in the list is actually the priority.
        return [
            ProcessName::STEP => ProcessName::STEP(),
            ProcessName::POI => ProcessName::POI(),
            ProcessName::ACCESS => ProcessName::ACCESS(),
            ProcessName::COMPLETION => ProcessName::COMPLETION(),
            ProcessName::SCENARIO => ProcessName::SCENARIO(),
            ProcessName::WORKFLOW => ProcessName::WORKFLOW(),
        ];
    }

}
