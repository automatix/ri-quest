<?php
namespace App\Process\StateEventHandlers\Workflow\Scenario\Poi\Step;

use App\Base\Enums\EventNames\Workflow\Scenario\Poi\StepEventName;
use App\Base\Events\WorkflowEvent;
use App\Base\Exceptions\GeneralException;
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

    /**
     * @param Event $event
     * @param string $eventName
     * @param EventDispatcherInterface $eventDispatcher
     * @throws GeneralException
     */
    public function onGeneralUserMessageReceived(Event $event, string $eventName, EventDispatcherInterface $eventDispatcher)
    {
        /** @var WorkflowEvent $event */
        $eventDispatcher->dispatch(StepEventName::FOO, new WorkflowEvent($event->getWorkflowProcess(), ['message' => __METHOD__]));
    }

    public function onWorkflowScenarioPoiStepFoo(Event $event, string $eventName, EventDispatcherInterface $eventDispatcher)
    {
        /** @var WorkflowEvent $event */
        echo $event->getMessage() . '<br>' .  __METHOD__ . '<br>' . 'Yeah!!!';
    }

}
