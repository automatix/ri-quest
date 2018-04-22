<?php
namespace App\Process;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

interface EventListenerInterface
{

    function handle(Event $event, AbstractEventName $eventName, EventDispatcherInterface $eventDispatcher);

}
