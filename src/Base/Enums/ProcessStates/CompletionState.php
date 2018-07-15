<?php
namespace App\Base\Enums\ProcessStates;

/**
 * @method static CompletionState STARTED()
 * @method static AccessState FINISHED()
 */
class CompletionState extends AbstractProcessState
{

    const STARTED = 'started';
    const FINISHED = 'finished';

}
