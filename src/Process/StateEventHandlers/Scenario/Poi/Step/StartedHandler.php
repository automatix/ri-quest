<?php
namespace App\Process\StateEventHandlers\Scenario\Poi\Step;

use App\Base\Enums\EventNames\GeneralEventName;
use App\Base\Enums\Events\GenericEvent;
use App\Process\StateEventHandlers\AbstractStateEventHandler;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class StartedHandler extends AbstractStateEventHandler
 *
 * @package App\Services\Process\Internal\StateHandlers\Scenario
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class StartedHandler extends AbstractStateEventHandler
{

    public function onGeneralUserMessageReceived(Event $event, GeneralEventName $eventName, EventDispatcherInterface $eventDispatcher)
    {
        $eventDispatcher->dispatch(GeneralEventName::FOO, new GenericEvent(__METHOD__));
    }

    public function onStepFoo(Event $event, GeneralEventName $eventName, EventDispatcherInterface $eventDispatcher)
    {
        echo $event->getSubject() . '<br>' .  __METHOD__ . '<br>' . 'Yeah!!!';
    }

}
