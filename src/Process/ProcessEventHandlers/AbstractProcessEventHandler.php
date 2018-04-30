<?php
namespace App\Process\ProcessEventHandlers;

use App\Base\Enums\Processes\EventNames\EventName;
use App\Base\Enums\Processes\States\AbstractProcessState;
use App\Base\Utils\NameConverterInterface;
use App\Services\Process\StateManagingServiceInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

abstract class AbstractProcessEventHandler implements ProcessEventHandlerInterface
{

    const ROOT_PROCESS_HANDLER_NAMESPACE = '\App\Process\StateEventHandlers';
    const RELEVANT_PROCESS_HANDLER_SUB_NAMESPACE = '';

    /** @var StateManagingServiceInterface $stateManagingService */
    private $stateManagingService;
    /** @var NameConverterInterface $nameConverter */
    private $nameConverter;

    public function __construct(StateManagingServiceInterface $stateManagingService, NameConverterInterface $nameConverter)
    {
        $this->stateManagingService = $stateManagingService;
        $this->nameConverter = $nameConverter;
    }

    abstract function handle(Event $event, EventName $eventName, EventDispatcherInterface $eventDispatcher);

    /**
     * @return StateManagingServiceInterface
     */
    public function getStateManagingService(): StateManagingServiceInterface
    {
        return $this->stateManagingService;
    }

    public function buildConcreteHandler(AbstractProcessState $currentState, EventName $eventName) : callable
    {
        $handlerClass =
            static::RELEVANT_PROCESS_HANDLER_SUB_NAMESPACE
            . '\\'
            . $this->nameConverter->denormalize(ucfirst($currentState->getValue()))
            . 'Handler'
        ;
        $handlerObject = new $handlerClass();
        $eventNameValue = $eventName->getValue();
        $eventNameValueUnderscoresOnly = str_replace('.', '_', $eventNameValue);
        $handlerMethod =
            'on'
            . $this->nameConverter->denormalize(ucfirst($eventNameValueUnderscoresOnly))
        ;

        return [$handlerObject, $handlerMethod];
    }

}