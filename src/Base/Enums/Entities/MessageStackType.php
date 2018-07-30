<?php
namespace App\Base\Enums\Entities;

use App\Base\Enums\AbstractEnum;

/**
 * @method static MessageStackType SEMANTICAL()
 * @method static MessageStackType PROCESS()
 *
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class MessageStackType extends AbstractEnum
{

    const SEMANTICAL = 'semantical';
    const PROCESS = 'plan';

}
