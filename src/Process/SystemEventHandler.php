<?php
namespace App\Process;

use App\Base\Enums\Processes\EventNames\EventName;
use App\Process\ProcessEventHandlers\ProcessEventHandlerInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class SystemEventHandler implements SystemEventHandlerInterface
{

    /** @var ProcessEventHandlerInterface[] */
    private $stateHandlers;

    public function __construct(ProcessEventHandlerInterface ... $listeners)
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
