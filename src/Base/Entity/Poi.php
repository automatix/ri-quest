<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Poi
 *
 * @ORM\Table(name="pois", indexes={@ORM\Index(name="fk_poi_scenario_idx", columns={"scenario_id"}), @ORM\Index(name="fk_poi_message_stack_idx", columns={"message_stack_id"})})
 * @ORM\Entity
 */
class Poi
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
     * @var MessageStack
     *
     * @ORM\ManyToOne(targetEntity="MessageStack")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="message_stack_id", referencedColumnName="id")
     * })
     */
    private $messageStack;

    /**
     * @var Scenario
     *
     * @ORM\ManyToOne(targetEntity="Scenario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="scenario_id", referencedColumnName="id")
     * })
     */
    private $scenario;

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

    public function getMessageStack(): ?MessageStack
    {
        return $this->messageStack;
    }

    public function setMessageStack(?MessageStack $messageStack): self
    {
        $this->messageStack = $messageStack;

        return $this;
    }

    public function getScenario(): ?Scenario
    {
        return $this->scenario;
    }

    public function setScenario(?Scenario $scenario): self
    {
        $this->scenario = $scenario;

        return $this;
    }


}
