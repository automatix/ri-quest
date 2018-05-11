<?php
namespace App\Base\Enums\Processes\States;

/**
 * @method static ScenarioState STARTED()
 * @method static ScenarioState PLAYING()
 * @method static ScenarioState PAUSED()
 * @method static ScenarioState FINISHED()
 * @method static ScenarioState ENDED()
 * @method static ScenarioState ACCESS_FAILED()
 * @method static ScenarioState ACCESS_PROCESSING()
 */
class ScenarioState extends AbstractProcessState
{

    const STARTED = 'started';
    const PLAYING = 'playing';
    const PAUSED = 'paused';
    const COMPLETED = 'finished';
    const ENDED = 'ended';
    const ACCESS_FAILED = 'access_failed';
    const ACCESS_PROCESSING = 'access_processing';

}
