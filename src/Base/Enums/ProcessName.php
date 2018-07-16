<?php
namespace App\Base\Enums;

use App\Base\Enums\AbstractEnum;

/**
 * @method static ProcessName ACCESS()
 * @method static ProcessName COMPLETION()
 * @method static ProcessName POI()
 * @method static ProcessName SCENARIO()
 * @method static ProcessName STEP()
 * @method static ProcessName WORKFLOW()
 *
 * @package App\Base\Enums
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class ProcessName extends AbstractEnum
{

    const ACCESS = 'access';
    const COMPLETION = 'completion';
    const POI = 'poi';
    const SCENARIO = 'scenario';
    const STEP = 'step';
    const WORKFLOW = 'workflow';

}
