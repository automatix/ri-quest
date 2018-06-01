<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Step
 *
 * @ORM\Table(name="steps", indexes={@ORM\Index(name="fk_step_poi_idx", columns={"poi_id"}), @ORM\Index(name="fk_step_message_stack_idx", columns={"message_stack_id"})})
 * @ORM\Entity
 */
class Step
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
     * @var bool
     *
     * @ORM\Column(name="order", type="boolean", nullable=false)
     */
    private $order;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=0, nullable=true)
     */
    private $type;

    /**
     * @var MessageStack
     *
     * @ORM\ManyToOne(targetEntity="MessageStack")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="message_stack_id", referencedColumnName="id")
     * })
     */
    private $messageStack;

    /**
     * @var Poi
     *
     * @ORM\ManyToOne(targetEntity="Poi")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="poi_id", referencedColumnName="id")
     * })
     */
    private $poi;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrder(): ?bool
    {
        return $this->order;
    }

    public function setOrder(bool $order): self
    {
        $this->order = $order;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

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

    public function getPoi(): ?Poi
    {
        return $this->poi;
    }

    public function setPoi(?Poi $poi): self
    {
        $this->poi = $poi;

        return $this;
    }


}
