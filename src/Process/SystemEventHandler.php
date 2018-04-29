<?php
namespace App\Process;

use App\Base\Enums\Processes\EventNames\EventName;
use App\Process\EventHandlerInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class SystemEventHandler implements EventHandlerInterface
{

    /** @var EventHandlerInterface[] */
    private $stateHandlers;

    public function __construct(EventHandlerInterface ... $listeners)
    {
        $this->stateHandlers = $listeners;
    }

    public function handle(Event $event, EventName $eventName, EventDispatcherInterface $eventDispatcher)
    {
        $eventName = EventName::search($eventName);
        foreach ($this->stateHandlers as $handler) {
            $handler->handle($event, $eventName, $eventDispatcher);
        }
    }

}
