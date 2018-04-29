<?php
namespace App\Interop\Website\Controller;

use App\Process\EventHandlerInterface;
use App\Services\Dummy\External\FooServiceInterface;
use App\Services\Process\ProcessHandlingServiceInterface;
use App\Services\Process\StateManagingServiceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class QuestController extends Controller
{

    /** @var StateManagingServiceInterface $stateManagingService */
    private $stateManagingService;
    /** @var ProcessHandlingServiceInterface $processHandlingService */
    private $processHandlingService;

    /**
     * QuestController constructor.
     *
     * @param StateManagingServiceInterface $stateManagingService
     * @param ProcessHandlingServiceInterface $processHandlingService
     */
    public function __construct(
        StateManagingServiceInterface $stateManagingService,
        EventHandlerInterface $processHandlingService
    ) {
        $this->stateManagingService = $stateManagingService;
        $this->processHandlingService = $processHandlingService;
    }

    public function processUserMessageAction(Request $request)
    {
        $currentState = $this->stateManagingService->detectFullState();
        $input = $request->get('message');
        $message = $this->messageMappingService->map($input, new IncomingMessage());
        $this->processHandlingService->handleState($currentState, $message);

        return new Response();
    }

}
