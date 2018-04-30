<?php
namespace App\Process\ProcessEventHandlers;

use App\Base\Enums\Processes\EventNames\EventName;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

interface ProcessEventHandlerInterface
{

    function handle(Event $event, EventName $eventName, EventDispatcherInterface $eventDispatcher);

}
