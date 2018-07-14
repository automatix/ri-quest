<?php
namespace App\Base\Entity;

use App\Base\Entity\MessageStacks\SemanticalMessageStack;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="attempts", indexes={@ORM\Index(name="fk_attempt_task_idx", columns={"task_id"})})
 * @ORM\Entity
 */
class Attempt extends AbstractEntity
{

    /**
     * @var int
     *
     * @ORM\Column(name="`order`", type="integer", nullable=false)
     */
    private $order;

    /**
     * @var AbstractTask
     *
     * @ORM\ManyToOne(targetEntity="AbstractTask", inversedBy="attempts")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $task;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Base\Entity\MessageStacks\SemanticalMessageStack")
     * @ORM\JoinTable(name="attempts_semantical_message_stacks",
     *   joinColumns={
     *     @ORM\JoinColumn(name="attempt_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="semantical_message_stack_id", referencedColumnName="id")
     *   }
     * )
     */
    private $semanticalMessageStacks;

    public function __construct()
    {
        parent::__construct();
        $this->semanticalMessageStacks = new ArrayCollection();
    }

    public function getOrder(): ?int
    {
        return $this->order;
    }

    public function setOrder(?int $order): self
    {
        $this->order = $order;
        return $this;
    }

    public function getTask(): ?AbstractTask
    {
        return $this->task;
    }

    public function setTask(?AbstractTask $task): self
    {
        $this->task = $task;
        return $this;
    }

    /**
     * @return Collection|SemanticalMessageStack[]
     */
    public function getSemanticalMessageStacks(): Collection
    {
        return $this->semanticalMessageStacks;
    }

    public function addSemanticalMessageStack(SemanticalMessageStack $semanticalMessageStack): self
    {
        if (!$this->semanticalMessageStacks->contains($semanticalMessageStack)) {
            $this->semanticalMessageStacks[] = $semanticalMessageStack;
        }
        return $this;
    }

    public function removeSemanticalMessageStack(SemanticalMessageStack $semanticalMessageStack): self
    {
        if ($this->semanticalMessageStacks->contains($semanticalMessageStack)) {
            $this->semanticalMessageStacks->removeElement($semanticalMessageStack);
        }
        return $this;
    }

}
