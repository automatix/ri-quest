<?php
namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MessageStack
 *
 * @ORM\Table(name="message_stacks")
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="`type`", type="string")
 * @ORM\DiscriminatorMap({
 *     "process" = "App\Base\Entity\MessageStacks\ProcessMessageStack",
 *     "semantical" = "App\Base\Entity\MessageStacks\SemanticalMessageStack"
 * })
 */
abstract class MessageStack extends AbstractEntity
{


}
