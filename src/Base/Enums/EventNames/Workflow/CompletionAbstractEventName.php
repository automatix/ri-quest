<?php
namespace App\Base\Enums\EventNames\Workflow;

use App\Base\Enums\EventNames\AbstractEventName;

/**
 * @method static CompletionAbstractEventName FOO()
 *
 * @package App\Base\Enums\EventNames\Workflow
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class CompletionAbstractEventName extends AbstractEventName
{

    const FOO = 'workflow.completion:foo';

}
