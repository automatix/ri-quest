<?php
namespace App\Process;

use App\Base\Enums\Processes\EventNames\EventName;
use App\Process\ProcessEventHandlers\GenericProcessEventHandler;
use App\Process\ProcessEventHandlers\ProcessEventHandlerInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class SystemEventHandler implements SystemEventHandlerInterface
{

    /** @var ProcessEventHandlerInterface[] */
    private $processEventHandlers;
    /** @var GenericProcessEventHandler */
    private $genericProcessEventHandler;

    public function __construct(
        GenericProcessEventHandler $genericProcessEventHandler,
        ProcessEventHandlerInterface ... $processEventHandlers
    ) {
        $this->genericProcessEventHandler = $genericProcessEventHandler;
        // The array index determines the priority and so the handling order!
        $this->processEventHandlers = $processEventHandlers;
    }

    public function handle(Event $event, string $eventName, EventDispatcherInterface $eventDispatcher)
    {
        $eventName = EventName::search($eventName);
        foreach ($this->processEventHandlers as $handler) {
            $handler->handle($event, EventName::$eventName(), $eventDispatcher);
        }
    }

}
