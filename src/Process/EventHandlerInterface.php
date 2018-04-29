<?php
namespace App\Process;

use App\Base\Enums\Processes\EventNames\AbstractEventName;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

interface EventHandlerInterface
{

    function handle(Event $event, AbstractEventName $eventName, EventDispatcherInterface $eventDispatcher);

}
