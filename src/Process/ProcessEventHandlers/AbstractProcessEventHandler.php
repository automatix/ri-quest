<?php
namespace App\Process\ProcessEventHandlers;

use App\Base\Enums\Processes\EventNames\EventName;
use App\Base\Enums\Processes\ProcessName;
use App\Base\Enums\Processes\States\AbstractProcessState;
use App\Process\StateEventHandlers\Registry\StateEventHandlerRegistryInterface;
use App\Services\Process\StateManagingServiceInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

abstract class AbstractProcessEventHandler implements ProcessEventHandlerInterface
{

    const ROOT_PROCESS_HANDLER_NAMESPACE = '\App\Process\StateEventHandlers';
    const RELEVANT_PROCESS_HANDLER_SUB_NAMESPACE = '';

    /** @var StateManagingServiceInterface $stateManagingService */
    private $stateManagingService;
    /** @var StateEventHandlerRegistryInterface $stateEventHandlerRegistry */
    private $stateEventHandlerRegistry;

    public function __construct(StateManagingServiceInterface $stateManagingService, StateEventHandlerRegistryInterface $stateEventHandlerRegistry)
    {
        $this->stateManagingService = $stateManagingService;
        $this->stateEventHandlerRegistry = $stateEventHandlerRegistry;
    }

    abstract function handle(Event $event, EventName $eventName, EventDispatcherInterface $eventDispatcher);

    /**
     * @return StateManagingServiceInterface
     */
    public function getStateManagingService(): StateManagingServiceInterface
    {
        return $this->stateManagingService;
    }

    protected function buildConcreteHandler(ProcessName $processName, AbstractProcessState $currentState, EventName $eventName) : callable
    {
        return $this->stateEventHandlerRegistry->get($processName, $currentState, $eventName);
    }

}