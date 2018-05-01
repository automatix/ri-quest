<?php
namespace App\Base\Enums\Processes\States;

/**
 * @method static RouteState STARTED()
 * @method static RouteState PLAYING()
 * @method static RouteState PAUSED()
 * @method static RouteState FINISHED()
 * @method static RouteState ENDED()
 */
class RouteState extends AbstractProcessState
{

    const STARTED = 'started';
    const PLAYING = 'playing';
    const PAUSED = 'paused';
    const FINISHED = 'finished';
    const ENDED = 'ended';

}
