<?php
namespace App\Process\ProcessEventHandlers;

use App\Base\Enums\Processes\EventNames\EventName;
use App\Base\Enums\Processes\States\AbstractProcessState;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class RouteHandler extends AbstractProcessEventHandler
{

    const RELEVANT_PROCESS_HANDLER_SUB_NAMESPACE = self::ROOT_PROCESS_HANDLER_NAMESPACE . '\Route';

    public function handle(Event $event, EventName $eventName, EventDispatcherInterface $eventDispatcher)
    {
        $currentState = $this->getStateManagingService()->detectRouteState();
        $concreteHandler = $this->buildConcreteHandler($currentState, $eventName);
        call_user_func($concreteHandler, $event, $eventName, $eventDispatcher);
    }

}
