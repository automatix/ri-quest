<?php
namespace App\Interop\Website\Controller;

use App\Base\Enums\Entities\ChatType;
use App\Base\Enums\EventNames\GeneralEventName;
use App\Base\Events\GenericEvent;
use App\Services\Process\ChatServiceInterface;
use App\Services\Process\ProcessManagingServiceInterface;
use App\Services\Process\WorkflowProcessServiceInterface;
use App\Services\RuntimeContext\RuntimeContextServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestController extends Controller
{

    /** @var EventDispatcherInterface */
    private $eventDispatcher;
    /** @var RuntimeContextServiceInterface */
    private $runtimeContextService;
    /** @var ChatServiceInterface */
    private $chatService;
    /** @var ProcessManagingServiceInterface */
    private $processManagingService;
    /** @var WorkflowProcessServiceInterface */
    private $workflowProcessService;

    /**
     * QuestController constructor.
     * @param EventDispatcherInterface $eventDispatcher
     * @param RuntimeContextServiceInterface $runtimeContextService
     * @param ChatServiceInterface $chatService
     * @param ProcessManagingServiceInterface $processManagingService
     */
    public function __construct(
        EventDispatcherInterface $eventDispatcher,
        RuntimeContextServiceInterface $runtimeContextService,
        ChatServiceInterface $chatService,
        ProcessManagingServiceInterface $processManagingService,
        WorkflowProcessServiceInterface $workflowProcessService
    ) {
        $this->eventDispatcher = $eventDispatcher;
        $this->runtimeContextService = $runtimeContextService;
        $this->chatService = $chatService;
        $this->processManagingService = $processManagingService;
        $this->workflowProcessService = $workflowProcessService;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function processUserMessageAction(Request $request)
    {
        // todo It's just a mock. The Chat ID should be fetched from the ChatBotService.
        $chatId = $request->get('chat_id');
        $chat = $this->chatService->findOneByIdentifierAndType($chatId, ChatType::TELEGRAM())
            ?: $this->chatService->create($chatId, ChatType::TELEGRAM())
        ;
        $workflowProcess = $this->chatService->findActiveWorkflowProcessForChat($chat)
            ?: $this->workflowProcessService->create($chat)
        ;
        $this->runtimeContextService->initializeRuntimeContext($chat);

        $message = $request->get('message');
        $this->eventDispatcher->dispatch(GeneralEventName::USER_MESSAGE_RECEIVED, new GenericEvent($message));

        return new Response();
    }

}
