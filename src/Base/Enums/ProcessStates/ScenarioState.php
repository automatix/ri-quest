<?php
namespace App\Base\Enums\ProcessStates;

/**
 * @method static ScenarioState STARTED()
 * @method static ScenarioState POI_PROCESSING()
 * @method static ScenarioState FINISHED()
 */
class ScenarioState extends AbstractProcessState
{

    const STARTED = 'started';
    const POI_PROCESSING = 'poi_processing';
    const FINISHED = 'finished';

}
