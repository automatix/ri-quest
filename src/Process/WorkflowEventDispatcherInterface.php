<?php
namespace App\Process;

use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

interface WorkflowEventDispatcherInterface
{

    function dispatch(Event $event, string $eventName, EventDispatcherInterface $eventDispatcher);

}
