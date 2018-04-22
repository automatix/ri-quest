<?php
namespace App\Process;

use App\Base\Enums\Processes\EventTypes\AbstractEventType;
use App\Process\Listeners\PoiHandler;
use App\Process\Listeners\QuestHandler;
use App\Process\Listeners\StepHandler;
use App\Services\Process\StateManagingServiceInterface;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class ProcessHandler implements EventListenerInterface
{

    /** @var StateManagingServiceInterface */
    private $stateManagingService;
    /** @var EventInStateHandlerInterface[] */
    private $handlers;

    public function __construct(StateManagingServiceInterface $stateManagingService)
    {
        $this->stateManagingService = $stateManagingService;

        $this->handlers = [
            'step' => new StepHandler(),
            'poi' => new PoiHandler(),
            'quest' => new QuestHandler(),
        ];
    }

    public function handle(Event $event, string $eventName, EventDispatcherInterface $eventDispatcher)
    {
        $eventType = AbstractEventType::search($eventName);

        $currentStepState = $this->stateManagingService->detectStepState();
        $currentPoiState = $this->stateManagingService->detectPoiState();
        $currentQuestState = $this->stateManagingService->detectQuestState();
        $currentFullState = $this->stateManagingService->detectFullState();

        $this->handlers['step']->handle($currentStepState, $event, $eventType, $eventDispatcher);
        $this->handlers['poi']->handle($currentPoiState, $event, $eventType, $eventDispatcher);
        $this->handlers['quest']->handle($currentQuestState, $event, $eventType, $eventDispatcher);

    }


}