<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="messages", indexes={@ORM\Index(name="fk_message_message_stack_idx", columns={"message_stack_id"})})
 * @ORM\Entity
 */
class Message
{

    /**
     * @var bool|null
     *
     * @ORM\Column(name="order", type="boolean", nullable=true)
     */
    private $order;

    /**
     * @var MessageStack
     *
     * @ORM\ManyToOne(targetEntity="MessageStack")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="message_stack_id", referencedColumnName="id")
     * })
     */
    private $messageStack;

    public function getOrder(): ?bool
    {
        return $this->order;
    }

    public function setOrder(?bool $order): self
    {
        $this->order = $order;

        return $this;
    }

    public function getMessageStack(): ?MessageStack
    {
        return $this->messageStack;
    }

    public function setMessageStack(?MessageStack $messageStack): self
    {
        $this->messageStack = $messageStack;

        return $this;
    }


}
