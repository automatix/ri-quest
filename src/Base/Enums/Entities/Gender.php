<?php
namespace App\Base\Enums\Entities;

use App\Base\Enums\AbstractEnum;

/**
 * @method static TaskType MAN()
 * @method static TaskType WOMAN()
 *
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class Gender extends AbstractEnum
{

    const MAN = 'm';
    const WOMAN = 'w';

}
