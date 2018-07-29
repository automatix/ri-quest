<?php
namespace App\Base\Enums;

/**
 * @method static ProcessName WORKFLOW()
 * @method static ProcessName ACCESS()
 * @method static ProcessName SCENARIO()
 * @method static ProcessName POI()
 * @method static ProcessName STEP()
 * @method static ProcessName COMPLETION()
 *
 * @package App\Base\Enums
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class ProcessName extends AbstractEnum
{

    const WORKFLOW = 'workflow';
    const ACCESS = 'workflow.access';
    const SCENARIO = 'workflow.scenario';
    const POI = 'workflow.scenario.poi';
    const STEP = 'workflow.scenario.poi.step';
    const COMPLETION = 'workflow.completion';

}
