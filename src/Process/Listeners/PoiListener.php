<?php
namespace App\Process\Listeners;

use App\Base\Enums\Processes\EventNames\AbstractEventName;
use App\Base\Enums\Processes\States\AbstractProcessState;
use App\Process\StateHandlerInterface;
use App\Services\Process\Internal\StateHandlers\Quest\AccessFailedHandler;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class PoiListener extends AbstractProcessListener
{

    const RELEVANT_STATE_HANDLER_NAMESPACE = '\App\Services\Process\Internal\StateHandlers\Poi';

    public function handle(AbstractProcessState $currentState, Event $event, AbstractEventName $eventName, EventDispatcherInterface $eventDispatcher)
    {
        $currentPoiState = $this->getStateManagingService()->detectPoiState();
        $concreteHandler = $this->buildConcreteHandler($currentPoiState, $eventName);
        call_user_func($concreteHandler, $event, $eventName, $eventDispatcher);
    }

}
