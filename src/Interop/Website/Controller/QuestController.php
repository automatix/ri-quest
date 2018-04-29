<?php
namespace App\Interop\Website\Controller;

use App\Base\Enums\Processes\EventNames\GeneralEventName;
use App\Base\Enums\Processes\Events\GenericEvent;
use App\Process\EventHandlerInterface;
use App\Services\Process\StateManagingServiceInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestController extends Controller
{

    /** @var StateManagingServiceInterface $stateManagingService */
    private $stateManagingService;
    /** @var EventHandlerInterface $systemEventHandler */
    private $systemEventHandler;
    /** @var EventDispatcherInterface */
    private $eventDispatcher;

    /**
     * QuestController constructor.
     *
     * @param StateManagingServiceInterface $stateManagingService
     * @param EventHandlerInterface $processHandlingService
     */
    public function __construct(
        StateManagingServiceInterface $stateManagingService,
        EventHandlerInterface $processHandlingService,
        EventDispatcherInterface $eventDispatcher
    ) {
        $this->stateManagingService = $stateManagingService;
        $this->systemEventHandler = $processHandlingService;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function processUserMessageAction(Request $request)
    {
        $message = $request->get('message');
        $this->systemEventHandler->handle(new GenericEvent($message), GeneralEventName::USER_MESSAGE_RECEIVED(), $this->eventDispatcher);

        return new Response();
    }

}
