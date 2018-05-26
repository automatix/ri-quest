<?php
namespace App\Process;

use App\Base\Enums\Processes\EventNames\EventName;
use App\Base\Enums\Processes\ProcessName;
use App\Process\ProcessEventHandlers\GenericProcessEventHandler;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class SystemEventHandler implements SystemEventHandlerInterface
{

    /** @var GenericProcessEventHandler */
    private $genericProcessEventHandler;

    public function __construct(
        GenericProcessEventHandler $genericProcessEventHandler
    ) {
        $this->genericProcessEventHandler = $genericProcessEventHandler;
    }

    public function handle(Event $event, string $eventName, EventDispatcherInterface $eventDispatcher)
    {
        $eventName = EventName::search($eventName);
        foreach ($this->getProcessNames() as $processName) {
            $this->genericProcessEventHandler->handle($event, EventName::$eventName(), $eventDispatcher, $processName);
        }
    }

    private function getProcessNames()
    {
        // The array index determines the priority and so the handling order!
        return [
            ProcessName::STEP => ProcessName::STEP(),
            ProcessName::POI => ProcessName::POI(),
            ProcessName::SCENARIO => ProcessName::SCENARIO(),
            ProcessName::ACCESS => ProcessName::ACCESS(),
            ProcessName::COMPLETION => ProcessName::COMPLETION(),
        ];
    }

}
