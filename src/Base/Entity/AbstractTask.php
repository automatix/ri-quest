<?php
namespace App\Base\Entity;

use App\Base\Entity\MessageStacks\SemanticalMessageStack;
use App\Base\Entity\Plans\Steps\TaskStepPlan;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * AbstractTask
 *
 * @ORM\Table(name="tasks", indexes={@ORM\Index(name="fk_task_task_step_idx", columns={"task_step_id"})})
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *     "question" = "App\Base\Entity\Tasks\QuestionTask",
 *     "fun" = "App\Base\Entity\Tasks\FunTask"
 * })
 */
abstract class AbstractTask extends AbstractEntity
{

    /**
     * @var TaskStepPlan
     *
     * @ORM\ManyToOne(targetEntity="TaskStepPlan")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_step_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $taskStep;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="Attempt", mappedBy="task")
     */
    private $attempts;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Base\Entity\MessageStacks\SemanticalMessageStack")
     * @ORM\JoinTable(name="tasks_semantical_message_stacks",
     *   joinColumns={
     *     @ORM\JoinColumn(name="task_id", referencedColumnName="id")
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
        $this->attempts = new ArrayCollection();
    }

    public function getTaskStep(): ?TaskStepPlan
    {
        return $this->taskStep;
    }

    public function setTaskStep(?TaskStepPlan $taskStep): self
    {
        $this->taskStep = $taskStep;
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

    /**
     * @return Collection|Attempt[]
     */
    public function getAttempts(): Collection
    {
        return $this->attempts;
    }

    public function addAttempt(Attempt $attempt): self
    {
        if (!$this->attempts->contains($attempt)) {
            $this->attempts[] = $attempt;
        }
        return $this;
    }

    public function removeAttempt(Attempt $attempt): self
    {
        if ($this->attempts->contains($attempt)) {
            $this->attempts->removeElement($attempt);
        }
        return $this;
    }

}
