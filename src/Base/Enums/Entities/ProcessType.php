<?php
namespace App\Base\Enums\Entities;

use App\Base\Enums\AbstractEnum;

/**
 * @method static ProcessType SCENARIO()
 * @method static ProcessType POI()
 * @method static ProcessType STEP()
 * @method static ProcessType PLACE_STEP()
 * @method static ProcessType INFO_STEP()
 * @method static ProcessType TASK_STEP()
 *
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class ProcessType extends AbstractEnum
{

    const SCENARIO = 'scenario';
    const POI = 'poi';
    const STEP = 'step';
    const PLACE_STEP = 'place_step';
    const INFO_STEP = 'info_step';
    const TASK_STEP = 'task_step';

}
