<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Scenario
 *
 * @ORM\Table(name="scenarios", indexes={@ORM\Index(name="fk_scenario_message_stack_idx", columns={"message_stack_id"})})
 * @ORM\Entity
 */
class Scenario
{

    /**
     * @var MessageStack
     *
     * @ORM\ManyToOne(targetEntity="MessageStack")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="message_stack_id", referencedColumnName="id")
     * })
     */
    private $messageStack;

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
