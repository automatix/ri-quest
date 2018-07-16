<?php
namespace App\Base\Enums\Entities;

use App\Base\Enums\AbstractEnum;

/**
 * @method static ProcessType ACCESS()
 * @method static ProcessType COMPLETION()
 * @method static ProcessType POI()
 * @method static ProcessType STEP()
 * @method static ProcessType PLACE_STEP()
 * @method static ProcessType INFO_STEP()
 * @method static ProcessType TASK_STEP()
 * @method static ProcessType SCENARIO()
 * @method static ProcessType WORKFLOW()
 *
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class ProcessType extends AbstractEnum
{

    const ACCESS = 'access';
    const COMPLETION = 'completion';
    const POI = 'poi';
    const SCENARIO = 'scenario';
    const STEP = 'step';
    const INFO_STEP = 'info_step';
    const PLACE_STEP = 'place_step';
    const TASK_STEP = 'task_step';
    const WORKFLOW = 'workflow';

}
