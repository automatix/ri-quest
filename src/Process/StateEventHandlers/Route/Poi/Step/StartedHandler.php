<?php
namespace App\Process\StateEventHandlers\Route\Poi\Step;

use App\Base\Enums\Processes\EventNames\EventName;
use App\Base\Enums\Processes\Events\GenericEvent;
use App\Process\StateEventHandlers\AbstractStateEventHandler;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class StartedHandler extends AbstractStateEventHandler
 *
 * @package App\Services\Process\Internal\StateHandlers\Route
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class StartedHandler extends AbstractStateEventHandler
{

    public function onGeneralUserMessageReceived(Event $event, EventName $eventName, EventDispatcherInterface $eventDispatcher)
    {
        $eventDispatcher->dispatch(EventName::STEP_FOO, new GenericEvent(__METHOD__));
    }

    public function onStepFoo(Event $event, EventName $eventName, EventDispatcherInterface $eventDispatcher)
    {
        die($event->getSubject() .  __METHOD__ . 'Yeah!!!');
    }

}
