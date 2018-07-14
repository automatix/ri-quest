<?php
namespace App\Base\Enums\Entities;

use App\Base\Enums\AbstractEnum;

/**
 * @method static LoopType TASK()
 * @method static LoopType ACCESS()
 *
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class LoopType extends AbstractEnum
{

    const TASK = 'task';
    const ACCESS = 'access';

}
