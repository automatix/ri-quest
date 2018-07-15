<?php
namespace App\Base\Enums\ProcessStates;

/**
 * @method static PoiState STARTED()
 * @method static PoiState INTRO_SENT()
 * @method static PoiState STEP_PROCESSING()
 * @method static PoiState FINISHED()
 */
class PoiState extends AbstractProcessState
{

    const STARTED = 'started';
    const INTRO_SENT = 'intro_sent';
    const STEP_PROCESSING = 'step_processing';
    const FINISHED = 'finished';

}
