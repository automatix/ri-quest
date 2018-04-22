<?php
namespace App\Process;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

interface EventListenerInterface
{

    function handle(Event $event, string $eventName, EventDispatcherInterface $eventDispatcher);

}
