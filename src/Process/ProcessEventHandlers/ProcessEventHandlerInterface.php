<?php
namespace App\Process\ProcessEventHandlers;

use App\Base\Enums\Processes\EventNames\EventName;
use App\Base\Enums\Processes\ProcessName;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

interface ProcessEventHandlerInterface
{

    function handle(ProcessName $processName, Event $event, EventName $eventName, EventDispatcherInterface $eventDispatcher);

}
