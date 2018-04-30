<?php
namespace App\Interop\Website\Controller;

use App\Base\Enums\Processes\EventNames\EventName;
use App\Base\Enums\Processes\Events\GenericEvent;
use App\Process\EventHandlerInterface;
use App\Process\SystemEventHandlerInterface;
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
     * @param EventHandlerInterface $systemEventHandler
     */
    public function __construct(
        StateManagingServiceInterface $stateManagingService,
        SystemEventHandlerInterface $systemEventHandler,
        EventDispatcherInterface $eventDispatcher
    ) {
        $this->stateManagingService = $stateManagingService;
        $this->systemEventHandler = $systemEventHandler;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function processUserMessageAction(Request $request)
    {
        $message = $request->get('message');
        $this->eventDispatcher->dispatch(EventName::USER_MESSAGE_RECEIVED, new GenericEvent($message));

        return new Response();
    }

}
