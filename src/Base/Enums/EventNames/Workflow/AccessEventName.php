<?php
namespace App\Base\Enums\EventNames\Workflow;

use App\Base\Enums\EventNames\AbstractEventName;

/**
 * @method static AccessEventName FOO()
 *
 * @package App\Base\Enums\EventNames
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class AccessEventName extends AbstractEventName
{

    const FOO = 'workflow.access:foo';

}
