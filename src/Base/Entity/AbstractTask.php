<?php
namespace App\Base\Entity;

use App\Base\Entity\MessageStacks\SemanticalMessageStack;
use App\Base\Entity\Processes\Steps\TaskStep;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * AbstractTask
 *
 * @ORM\Table(name="tasks", indexes={@ORM\Index(name="fk_task_task_step_idx", columns={"task_step_id"})})
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="`type`", type="string")
 * @ORM\DiscriminatorMap({
 *     "question" = "App\Base\Entity\Tasks\QuestionTask",
 *     "fun" = "App\Base\Entity\Tasks\FunTask"
 * })
 */
abstract class AbstractTask extends AbstractEntity
{

    /**
     * @var TaskStep
     *
     * @ORM\ManyToOne(targetEntity="App\Base\Entity\Processes\Steps\TaskStep")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_step_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $taskStep;

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
    }

    public function getTaskStep(): ?TaskStep
    {
        return $this->taskStep;
    }

    public function setTaskStep(?TaskStep $taskStep): self
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

}
