<?php
namespace App\Process\HandlerRegistry\Registries;

use App\Base\Enums\ProcessStates\AccessState;
use App\Process\StateEventHandlers\AbstractStateEventHandler;
use App\Process\HandlerRegistry\Registries\AbstractProcessStateEventHandlerRegistry;
use App\Process\StateEventHandlers\Workflow\Access\CanceledHandler;
use App\Process\StateEventHandlers\Workflow\Access\FinishedHandler;
use App\Process\StateEventHandlers\Workflow\Access\StartedHandler;
use App\Process\StateEventHandlers\Workflow\Access\TicketAttemptFailedHandler;
use App\Process\StateEventHandlers\Workflow\Access\TicketAttemptSuccessfullHandler;
use App\Process\StateEventHandlers\Workflow\Access\TicketReceivedHandler;
use App\Process\StateEventHandlers\Workflow\Access\TicketRequestedHandler;


class AccessStateEventHandlerRegistry extends AbstractProcessStateEventHandlerRegistry
{

    /** @var AbstractStateEventHandler[] */
    private $stateEventHandlers;

    public function __construct(
        StartedHandler $startedHandler,
        TicketRequestedHandler $ticketRequestedHandler,
        TicketReceivedHandler $ticketReceivedHandler,
        TicketAttemptFailedHandler $ticketAttemptFailedHandler,
        CanceledHandler $canceledHandler,
        TicketAttemptSuccessfullHandler $ticketAttemptSuccessfulHandler,
        FinishedHandler $finishedHandler
    ) {
        $this->stateEventHandlers = [
            AccessState::STARTED => $startedHandler,
            AccessState::TICKET_REQUESTED => $ticketRequestedHandler,
            AccessState::TICKET_RECEIVED => $ticketReceivedHandler,
            AccessState::TICKET_ATTEMPT_FAILED => $ticketAttemptFailedHandler,
            AccessState::CANCELED => $canceledHandler,
            AccessState::TICKET_ATTEMPT_SUCCESSFUL => $ticketAttemptSuccessfulHandler,
            AccessState::FINISHED => $finishedHandler,
        ];
    }

    /**
     * @return array
     */
    public function getStateEventHandlers() : array
    {
        return $this->stateEventHandlers;
    }

}
