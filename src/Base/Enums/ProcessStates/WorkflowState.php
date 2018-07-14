<?php
namespace App\Base\Enums\ProcessStates;

/**
 * @method static WorkflowState STARTED()
 * @method static WorkflowState FINISHED()
 * @method static WorkflowState ENDED()
 * @method static WorkflowState ACCESS_FAILED()
 * @method static WorkflowState ACCESS_PROCESSING()
 */
class WorkflowState extends AbstractProcessState
{

    const STARTED = 'started';
    const COMPLETED = 'finished';
    const ENDED = 'ended';
    const ACCESS_FAILED = 'access_failed';
    const ACCESS_PROCESSING = 'access_processing';

}
