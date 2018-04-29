<?php
namespace App\Process;

use App\Base\Enums\Processes\EventNames\EventName;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

interface EventHandlerInterface
{

    function handle(Event $event, EventName $eventName, EventDispatcherInterface $eventDispatcher);

}
