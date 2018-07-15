<?php
namespace App\Base\Enums\ProcessStates;

/**
 * @method static WorkflowState STARTED()
 * @method static WorkflowState INTRO_SENT()
 * @method static WorkflowState ACCESS_PROCESSING()
 * @method static WorkflowState ACCESS_FAILED()
 * @method static WorkflowState ACCESS_OK()
 * @method static WorkflowState SCENARIO_PROCESSING()
 * @method static WorkflowState COMPLETION_PROCESSING()
 * @method static WorkflowState FINISHED()
 */
class WorkflowState extends AbstractProcessState
{

    const STARTED = 'started';
    const INTRO_SENT = 'intro_sent';
    const ACCESS_PROCESSING = 'access_processing';
    const ACCESS_FAILED = 'access_failed';
    const ACCESS_OK = 'access_ok';
    const SCENARIO_PROCESSING = 'scenario_processing';
    const COMPLETION_PROCESSING = 'completion_processing';
    const FINISHED = 'finished';

}
