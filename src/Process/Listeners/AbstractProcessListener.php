<?php
namespace App\Process\Listeners;

use App\Base\Enums\Processes\EventNames\AbstractEventName;
use App\Base\Enums\Processes\States\AbstractProcessState;
use App\Process\StateHandlerInterface;
use App\Services\Process\StateManagingServiceInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use App\Base\Utils\NameConverterInterface;

abstract class AbstractProcessListener implements StateHandlerInterface
{

    const RELEVANT_STATE_HANDLER_NAMESPACE = '';

    /** @var StateManagingServiceInterface $stateManagingService */
    private $stateManagingService;
    /** @var NameConverterInterface $nameConverter */
    private $nameConverter;

    public function __construct(StateManagingServiceInterface $stateManagingService, NameConverterInterface $nameConverter)
    {
        $this->stateManagingService = $stateManagingService;
    }

    abstract function handle(AbstractProcessState $currentState, Event $event, AbstractEventName $eventName, EventDispatcherInterface $eventDispatcher);

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
            static::RELEVANT_STATE_HANDLER_NAMESPACE
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