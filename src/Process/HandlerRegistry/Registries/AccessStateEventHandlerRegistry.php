<?php
namespace App\Process\HandlerRegistry\Registries;

use App\Base\Enums\ProcessStates\AccessState;
use App\Process\StateEventHandlers\AbstractStateEventHandler;
use App\Process\HandlerRegistry\Registries\AbstractProcessStateEventHandlerRegistry;
use App\Process\StateEventHandlers\Workflow\Access\CanceledHandler;
use App\Process\StateEventHandlers\Workflow\Access\StartedHandler;
use App\Process\StateEventHandlers\Workflow\Access\TicketAttemptFailedHandler;
use App\Process\StateEventHandlers\Workflow\Access\TicketAttemptSuccessfullHandler;
use App\Process\StateEventHandlers\Workflow\Access\TicketReceivedHandler;
use App\Process\StateEventHandlers\Workflow\Access\TicketRequestedHandler;
use App\Process\StateEventHandlers\Workflow\Scenario\FinishedHandler;

class AccessStateEventHandlerRegistry extends AbstractProcessStateEventHandlerRegistry
{

    /** @var AbstractStateEventHandler[] */
    private $stateEventHandlers;

    public function __construct(
        StartedHandler $startedHandler,
        TicketRequestedHandler $ticketRequestedHandler,
        TicketReceivedHandler $ticketReceivedHandler,
        TicketAttemptFailedHandler $ticketAtemptFailedHandler,
        CanceledHandler $canceledHandler,
        TicketAttemptSuccessfullHandler $ticketAtemptSuccessfulHandler,
        FinishedHandler $finishedHandler
    ) {
        $this->stateEventHandlers = [
            AccessState::STARTED => $startedHandler,
            AccessState::TICKET_REQUESTED => $ticketRequestedHandler,
            AccessState::TICKET_RECEIVED => $ticketReceivedHandler,
            AccessState::TICKET_ATEMPT_FAILED => $ticketAtemptFailedHandler,
            AccessState::CANCELED => $canceledHandler,
            AccessState::TICKET_ATEMPT_SUCCESSFUL => $ticketAtemptSuccessfulHandler,
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
