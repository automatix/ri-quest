<?php
namespace App\Base\Enums\ProcessStates;

/**
 * @method static AccessState STARTED()
 * @method static AccessState TICKET_REQUESTED()
 * @method static AccessState TICKET_RECEIVED()
 * @method static AccessState TICKET_ATEMPT_FAILED()
 * @method static AccessState CANCELED()
 * @method static AccessState TICKET_ATEMPT_SUCCESSFUL()
 * @method static AccessState FINISHED()
 */
class AccessState extends AbstractProcessState
{

    const STARTED = 'started';
    const TICKET_REQUESTED = 'ticket_requested';
    const TICKET_RECEIVED = 'ticket_received';
    const TICKET_ATEMPT_FAILED = 'ticket_atempt_failed';
    const CANCELED = 'canceled';
    const TICKET_ATEMPT_SUCCESSFUL = 'ticket_atempt_successful';
    const FINISHED = 'finished';

}
