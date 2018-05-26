<?php
namespace App\Process\ProcessEventHandlers;

use App\Base\Enums\Processes\EventNames\EventName;
use App\Base\Enums\Processes\ProcessName;
use App\Base\Exceptions\EventHandlingException;
use App\Process\HandlerRegistry\StateEventHandlerRegistryInterface;
use App\Services\Process\StateManagingServiceInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class GenericProcessEventHandler implements ProcessEventHandlerInterface
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

    public function handle(ProcessName $processName, Event $event, EventName $eventName, EventDispatcherInterface $eventDispatcher)
    {
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
