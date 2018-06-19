<?php

namespace App\Base\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Process
 *
 * @ORM\Table(name="processes", uniqueConstraints={@ORM\UniqueConstraint(name="uq_unique_order_for_process", columns={"parent_id", "order"})}, indexes={@ORM\Index(name="fk_process_process_idx", columns={"parent_id"})})
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *     "scenario" = "Scenario",
 *     "poi" = "Poi",
 *     "place_step" = "PlaceStep",
 *     "task_step" = "TaskStep",
 *     "info_step" = "InfoStep"
 * })
 */
abstract class Process extends AbstractEntity
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
     * @var Process
     *
     * @ORM\ManyToOne(targetEntity="Process")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * })
     */
    private $parent;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="ProcessMessageStack")
     * @ORM\JoinTable(name="process_process_message_stack",
     *   joinColumns={
     *     @ORM\JoinColumn(name="process_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="process_message_stack_id", referencedColumnName="id")
     *   }
     * )
     */
    private $processMessageStack;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->processMessageStack = new ArrayCollection();
    }

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

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection|ProcessMessageStack[]
     */
    public function getProcessMessageStack(): Collection
    {
        return $this->processMessageStack;
    }

    public function addProcessMessageStack(ProcessMessageStack $processMessageStack): self
    {
        if (!$this->processMessageStack->contains($processMessageStack)) {
            $this->processMessageStack[] = $processMessageStack;
        }

        return $this;
    }

    public function removeProcessMessageStack(ProcessMessageStack $processMessageStack): self
    {
        if ($this->processMessageStack->contains($processMessageStack)) {
            $this->processMessageStack->removeElement($processMessageStack);
        }

        return $this;
    }

}
