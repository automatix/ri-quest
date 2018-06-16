<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MessageStacks
 *
 * @ORM\Table(name="message_stacks")
 * @ORM\Entity
 */
class MessageStacks
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=0, nullable=true)
     */
    private $type;


}
