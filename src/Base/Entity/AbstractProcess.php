<?php
namespace App\Base\Entity;

use App\Base\Entity\MessageStacks\ProcessMessageStack;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * AbstractProcess
 *
 * @ORM\Table(name="processes", uniqueConstraints={@ORM\UniqueConstraint(name="uq_unique_order_for_process", columns={"parent_id", "`order`"})}, indexes={@ORM\Index(name="fk_process_process_idx", columns={"parent_id"})})
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="`type`", type="string")
 * @ORM\DiscriminatorMap({
 *     "access" = "App\Base\Entity\Processes\Access",
 *     "completion" = "App\Base\Entity\Processes\Completion",
 *     "poi" = "App\Base\Entity\Processes\Poi",
 *     "scenario" = "App\Base\Entity\Processes\Scenario",
 *     "step" = "App\Base\Entity\Processes\Step",
 *     "info_step" = "App\Base\Entity\Processes\Steps\InfoStep",
 *     "place_step" = "App\Base\Entity\Processes\Steps\PlaceStep",
 *     "task_step" = "App\Base\Entity\Processes\Steps\TaskStep",
 *     "workflow" = "App\Base\Entity\Processes\Workflow",
 * })
 */
abstract class AbstractProcess extends AbstractEntity
{

    /**
     * @var int
     *
     * @ORM\Column(name="`order`", type="integer", nullable=false)
     */
    private $order;

    /**
     * @var AbstractProcess
     *
     * @ORM\ManyToOne(targetEntity="AbstractProcess", inversedBy="children")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * })
     */
    private $parent;

    /**
     * One Category has Many Categories.
     * @ORM\OneToMany(targetEntity="AbstractProcess", mappedBy="parent")
     */
    private $children;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Base\Entity\MessageStacks\ProcessMessageStack")
     * @ORM\JoinTable(name="process_process_message_stack",
     *   joinColumns={
     *     @ORM\JoinColumn(name="process_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="process_message_stack_id", referencedColumnName="id")
     *   }
     * )
     */
    private $processMessageStacks;

    public function __construct()
    {
        parent::__construct();
        $this->processMessageStacks = new ArrayCollection();
        $this->children = new ArrayCollection();
    }

    public function getOrder(): ?int
    {
        return $this->order;
    }

    public function setOrder(int $order)
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
    public function getProcessMessageStacks(): Collection
    {
        return $this->processMessageStacks;
    }

    public function addProcessMessageStack(ProcessMessageStack $processMessageStack): self
    {
        if (!$this->processMessageStacks->contains($processMessageStack)) {
            $this->processMessageStacks[] = $processMessageStack;
        }
        return $this;
    }

    public function removeProcessMessageStack(ProcessMessageStack $processMessageStack): self
    {
        if ($this->processMessageStacks->contains($processMessageStack)) {
            $this->processMessageStacks->removeElement($processMessageStack);
        }
        return $this;
    }

    /**
     * @return Collection|AbstractProcess[]
     */
    public function getChildren(): Collection
    {
        return $this->children;
    }

    public function addChild(AbstractProcess $child): self
    {
        if (!$this->children->contains($child)) {
            $this->children[] = $child;
        }
        return $this;
    }

    public function removeChild(AbstractProcess $child): self
    {
        if ($this->children->contains($child)) {
            $this->children->removeElement($child);
        }
        return $this;
    }

}
