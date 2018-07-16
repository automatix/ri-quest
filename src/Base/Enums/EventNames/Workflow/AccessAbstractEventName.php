<?php
namespace App\Base\Enums\EventNames\Workflow;

use App\Base\Enums\EventNames\AbstractEventName;

/**
 * @method static AccessAbstractEventName FOO()
 *
 * @package App\Base\Enums\EventNames\Workflow
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class AccessAbstractEventName extends AbstractEventName
{

    const FOO = 'workflow.access:foo';

}
