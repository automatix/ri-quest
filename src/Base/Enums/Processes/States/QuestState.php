<?php
namespace App\Base\Enums\Processes\States;

/**
 * @method static QuestState STARTED()
 * @method static QuestState PLAYING()
 * @method static QuestState PAUSED()
 * @method static QuestState FINISHED()
 * @method static QuestState ENDED()
 */
class QuestState extends AbstractProcessState
{

    const STARTED = 'started';
    const PLAYING = 'playing';
    const PAUSED = 'paused';
    const FINISHED = 'finished';
    const ENDED = 'ended';

}
