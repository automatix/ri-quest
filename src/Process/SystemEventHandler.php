<?php
namespace App\Process;

use App\Base\Enums\Processes\EventNames\AbstractEventName;
use App\Process\EventHandlerInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class SystemEventHandler implements EventHandlerInterface
{

    /** @var EventHandlerInterface[] */
    private $stateHandlers;

    public function __construct(... $listeners)
    {
        $this->stateHandlers = $listeners;
    }

    public function handle(Event $event, AbstractEventName $eventName, EventDispatcherInterface $eventDispatcher)
    {
        $eventName = AbstractEventName::search($eventName);
        foreach ($this->stateHandlers as $handler) {
            $handler->handle($event, $eventName, $eventDispatcher);
        }
    }

}
