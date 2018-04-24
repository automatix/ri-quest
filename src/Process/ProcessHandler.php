<?php
namespace App\Process;

use App\Base\Enums\Processes\EventNames\AbstractEventName;
use App\Process\Listeners\PoiListener;
use App\Process\Listeners\QuestListener;
use App\Process\Listeners\StepListener;
use App\Services\Process\StateManagingServiceInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ProcessHandler implements EventListenerInterface
{

    /** @var StateManagingServiceInterface */
    private $stateManagingService;
    /** @var StateHandlerInterface[] */
    private $handlers;

    public function __construct(StateManagingServiceInterface $stateManagingService)
    {
        $this->stateManagingService = $stateManagingService;

        $this->handlers = [
            'step' => new StepListener(),
            'poi' => new PoiListener(),
            'quest' => new QuestListener(),
        ];
    }

    public function handle(Event $event, AbstractEventName $eventName, EventDispatcherInterface $eventDispatcher)
    {
        $eventType = AbstractEventName::search($eventName);

        $currentStepState = $this->stateManagingService->detectStepState();
        $currentPoiState = $this->stateManagingService->detectPoiState();
        $currentQuestState = $this->stateManagingService->detectQuestState();
        $currentFullState = $this->stateManagingService->detectFullState();

        $this->handlers['step']->handle($currentStepState, $event, $eventType, $eventDispatcher);
        $this->handlers['poi']->handle($currentPoiState, $event, $eventType, $eventDispatcher);
        $this->handlers['quest']->handle($currentQuestState, $event, $eventType, $eventDispatcher);

    }


}