<?php
namespace App\Interop\Website\Controller;

use App\Base\Enums\Processes\EventNames\EventName;
use App\Base\Enums\Processes\Events\GenericEvent;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestController extends Controller
{

    /** @var EventDispatcherInterface */
    private $eventDispatcher;

    /**
     * QuestController constructor.
     *
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function processUserMessageAction(Request $request)
    {
        $message = $request->get('message');
        $this->eventDispatcher->dispatch(EventName::USER_MESSAGE_RECEIVED, new GenericEvent($message));

        return new Response();
    }

}
