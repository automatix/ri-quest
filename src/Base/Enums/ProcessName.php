<?php
namespace App\Base\Enums;

use App\Base\Enums\AbstractEnum;

/**
 * @method static ProcessName WORKFLOW()
 * @method static ProcessName SCENARIO()
 * @method static ProcessName ACCESS()
 * @method static ProcessName COMPLETION()
 * @method static ProcessName POI()
 * @method static ProcessName STEP()
 *
 * @package App\Base\Enums
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class ProcessName extends AbstractEnum
{

    const WORKFLOW = 'workflow';
    const SCENARIO = 'scenario';
    const ACCESS = 'access';
    const COMPLETION = 'completion';
    const POI = 'poi';
    const STEP = 'step';

}
