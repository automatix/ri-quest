<?php
namespace App\Process;

use App\Base\Enums\ProcessName;
use App\Base\Exceptions\EventHandlingException;
use App\Process\HandlerRegistry\StateEventHandlerRegistryInterface;
use App\Services\Process\ProcessManagingServiceInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

abstract class AbstractEventHandler implements WorkflowEventHandlerInterface
{

    /** @var ProcessManagingServiceInterface $processManagingService */
    private $processManagingService;
    /** @var StateEventHandlerRegistryInterface $stateEventHandlerRegistry */
    private $stateEventHandlerRegistry;

    public function __construct(ProcessManagingServiceInterface $processManagingService, StateEventHandlerRegistryInterface $stateEventHandlerRegistry)
    {
        $this->processManagingService = $processManagingService;
        $this->stateEventHandlerRegistry = $stateEventHandlerRegistry;
    }

    /**
     * @return ProcessManagingServiceInterface
     */
    public function getProcessManagingService(): ProcessManagingServiceInterface
    {
        return $this->processManagingService;
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
            $currentState = $this->getProcessManagingService()->detectProcessState($processName);
            try {
                $concreteHandler = $this->getEventHandlerRegistry()->get($processName, $currentState, $eventName);
                call_user_func($concreteHandler, $event, $eventName, $eventDispatcher);
                break;
            } catch (EventHandlingException $e) {
                $breakpoint = null;
                // do nothing...
            }
        }
    }

    protected abstract function getProcessNames();

}
