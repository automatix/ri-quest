<?php
namespace App\Base\Enums\ProcessStates;

/**
 * @method static StepState STARTED()
 * @method static StepState TASK_ASSIGNED()
 * @method static StepState QUESTION_ASKED()
 * @method static StepState ATTEMPT_MADE()
 * @method static StepState CANCELED()
 * @method static StepState ATTEMPT_FAILED()
 * @method static StepState FAILED()
 * @method static StepState COMPLETED()
 * @method static StepState FINISHED()
 */
class StepState extends AbstractProcessState
{

    const STARTED = 'started';
    const TASK_ASSIGNED = 'task_assigned';
    const QUESTION_ASKED = 'question_asked';
    const ATTEMPT_MADE = 'attempt_made';
    const CANCELED = 'canceled';
    const ATTEMPT_FAILED = 'attempt_failed';
    const FAILED = 'failed';
    const COMPLETED = 'completed';
    const FINISHED = 'finished';

}
