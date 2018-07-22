<?php
namespace App\Base\Enums\EventNames\Workflow;

use App\Base\Enums\EventNames\AbstractEventName;

/**
 * @method static CompletionEventName FOO()
 *
 * @package App\Base\Enums\EventNames\Workflow
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class CompletionEventName extends AbstractEventName
{

    const FOO = 'workflow.completion:foo';

}
