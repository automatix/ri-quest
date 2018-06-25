<?php
namespace App\Base\Enums\Entities;

use App\Base\Enums\AbstractEnum;

/**
 * @method static TaskType OPEN()
 * @method static TaskType CLOSED()
 *
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class QuestionType extends AbstractEnum
{

    const OPEN = 'open';
    const CLOSED = 'closed';

}
