<?php
namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MessageStack
 *
 * @ORM\Table(name="message_stacks")
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string", columnDefinition="ENUM('process', 'semantical')")
 * @ORM\DiscriminatorMap({
 *     "process" = "ProcessMessageStack",
 *     "semantical" = "SemanticalMessageStack"
 * })
 */
abstract class MessageStack extends AbstractEntity
{


}
