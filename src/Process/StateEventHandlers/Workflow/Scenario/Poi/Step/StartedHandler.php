<?php
namespace App\Process\StateEventHandlers\Workflow\Scenario\Poi\Step;

use App\Base\Enums\EventNames\Workflow\Scenario\Poi\StepEventName;
use App\Base\Events\GenericEvent;
use App\Process\StateEventHandlers\AbstractStateEventHandler;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

/**
 * Class StartedHandler extends AbstractStateEventHandler
 *
 * @package App\Services\Process\Internal\StateHandlers\Scenario\Poi\Step
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class StartedHandler extends AbstractStateEventHandler
{

    public function onGeneralUserMessageReceived(Event $event, string $eventName, EventDispatcherInterface $eventDispatcher)
    {
        $eventDispatcher->dispatch(StepEventName::FOO, new GenericEvent(__METHOD__));
    }

    public function onWorkflowScenarioPoiStepFoo(Event $event, string $eventName, EventDispatcherInterface $eventDispatcher)
    {
        echo $event->getSubject() . '<br>' .  __METHOD__ . '<br>' . 'Yeah!!!';
    }

}
