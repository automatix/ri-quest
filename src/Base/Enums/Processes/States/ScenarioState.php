<?php
namespace App\Base\Enums\Processes\States;

/**
 * @method static ScenarioState STARTED()
 * @method static ScenarioState PLAYING()
 * @method static ScenarioState PAUSED()
 * @method static ScenarioState FINISHED()
 * @method static ScenarioState ENDED()
 */
class ScenarioState extends AbstractProcessState
{

    const STARTED = 'started';
    const PLAYING = 'playing';
    const PAUSED = 'paused';
    const FINISHED = 'finished';
    const ENDED = 'ended';

}
