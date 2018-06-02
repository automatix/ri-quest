<?php
namespace App\Base\Enums\Entities;

use App\Base\Enums\AbstractEnum;

/**
 * @method static StepType INFO()
 * @method static StepType PLACE()
 * @method static StepType TASK()
 *
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class StepType extends AbstractEnum
{

    const INFO = 'info';
    const PLACE = 'place';
    const TASK = 'tesk';

}
