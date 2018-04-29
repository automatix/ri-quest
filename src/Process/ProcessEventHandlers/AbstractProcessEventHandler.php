<?php
namespace App\Process\ProcessEventHandlers;

use App\Base\Enums\Processes\EventNames\AbstractEventName;
use App\Base\Enums\Processes\States\AbstractProcessState;
use App\Process\EventHandlerInterface;
use App\Services\Process\StateManagingServiceInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use App\Base\Utils\NameConverterInterface;

abstract class AbstractProcessEventHandler implements EventHandlerInterface
{

    const ROOT_PROCESS_HANDLER_NAMESPACE = '\App\Process\ProcessEventHandlers';
    const RELEVANT_PROCESS_HANDLER_SUB_NAMESPACE = '';

    /** @var StateManagingServiceInterface $stateManagingService */
    private $stateManagingService;
    /** @var NameConverterInterface $nameConverter */
    private $nameConverter;

    public function __construct(StateManagingServiceInterface $stateManagingService, NameConverterInterface $nameConverter)
    {
        $this->stateManagingService = $stateManagingService;
    }

    abstract function handle(Event $event, AbstractEventName $eventName, EventDispatcherInterface $eventDispatcher);

        /**
     * @return StateManagingServiceInterface
     */
    public function getStateManagingService(): StateManagingServiceInterface
    {
        return $this->stateManagingService;
    }

    public function buildConcreteHandler(AbstractProcessState $currentState, AbstractEventName $eventName) : callable
    {
        $handlerClass =
            static::RELEVANT_PROCESS_HANDLER_SUB_NAMESPACE
            . '\\'
            . $this->nameConverter->denormalize($currentState->getValue())
            . 'Handler'
        ;
        $handlerObject = new $handlerClass();
        $handlerMethod =
            'on'
            . $this->nameConverter->denormalize($eventName->getValue())
        ;

        return [$handlerObject, $handlerMethod];
    }

}