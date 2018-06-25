<?php
namespace App\Base\Enums\Entities;

use App\Base\Enums\AbstractEnum;

/**
 * @method static TaskType CORRECT()
 * @method static TaskType WRONG()
 *
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class AnswerType extends AbstractEnum
{

    const CORRECT = 'correct';
    const WRONG = 'wrong';

}
