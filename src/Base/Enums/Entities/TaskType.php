<?php
namespace App\Base\Enums\Entities;

use App\Base\Enums\AbstractEnum;

/**
 * @method static TaskType QUESTION()
 * @method static TaskType FUN()
 *
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class TaskType extends AbstractEnum
{

    const QUESTION = 'question';
    const FUN = 'fun';

}
