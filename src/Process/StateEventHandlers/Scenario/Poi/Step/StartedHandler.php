<?php
namespace App\Process\StateEventHandlers\Scenario\Poi\Step;

use App\Base\Enums\EventNames\GeneralEventName;
use App\Base\Enums\EventNames\Scenario\Poi\StepAbstractEventName;
use App\Base\Events\GenericEvent;
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

    public function onGeneralUserMessageReceived(Event $event, string $eventName, EventDispatcherInterface $eventDispatcher)
    {
        $eventDispatcher->dispatch(StepAbstractEventName::FOO, new GenericEvent(__METHOD__));
    }

    public function onScenarioPoiStepFoo(Event $event, string $eventName, EventDispatcherInterface $eventDispatcher)
    {
        echo $event->getSubject() . '<br>' .  __METHOD__ . '<br>' . 'Yeah!!!';
    }

}
