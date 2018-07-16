<?php
namespace App\Base\Enums\ProcessStates;

/**
 * @method static AccessState STARTED()
 * @method static AccessState TICKET_REQUESTED()
 * @method static AccessState TICKET_RECEIVED()
 * @method static AccessState TICKET_ATTEMPT_FAILED()
 * @method static AccessState CANCELED()
 * @method static AccessState TICKET_ATTEMPT_SUCCESSFUL()
 * @method static AccessState FINISHED()
 */
class AccessState extends AbstractProcessState
{

    const STARTED = 'started';
    const TICKET_REQUESTED = 'ticket_requested';
    const TICKET_RECEIVED = 'ticket_received';
    const TICKET_ATTEMPT_FAILED = 'ticket_attempt_failed';
    const CANCELED = 'canceled';
    const TICKET_ATTEMPT_SUCCESSFUL = 'ticket_attempt_successful';
    const FINISHED = 'finished';

}
