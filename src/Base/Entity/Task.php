<?php

namespace App\Base\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Task
 *
 * @ORM\Table(name="tasks", indexes={@ORM\Index(name="fk_task_task_step_idx", columns={"task_step_id"})})
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string", columnDefinition="ENUM('question', 'fun')")
 * @ORM\DiscriminatorMap({
 *     "question" = "QuestionTask",
 *     "fun" = "FunTask"
 * })
 */
abstract class Task extends AbstractEntity
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
     * @var TaskStep
     *
     * @ORM\ManyToOne(targetEntity="TaskStep")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_step_id", referencedColumnName="id")
     * })
     */
    private $taskStep;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="SemanticalMessageStack")
     * @ORM\JoinTable(name="tasks_semantical_message_stacks",
     *   joinColumns={
     *     @ORM\JoinColumn(name="task_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="semantical_message_stack_id", referencedColumnName="id")
     *   }
     * )
     */
    private $semanticalMessageStack;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->semanticalMessageStack = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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
    public function getSemanticalMessageStack(): Collection
    {
        return $this->semanticalMessageStack;
    }

    public function addSemanticalMessageStack(SemanticalMessageStack $semanticalMessageStack): self
    {
        if (!$this->semanticalMessageStack->contains($semanticalMessageStack)) {
            $this->semanticalMessageStack[] = $semanticalMessageStack;
        }

        return $this;
    }

    public function removeSemanticalMessageStack(SemanticalMessageStack $semanticalMessageStack): self
    {
        if ($this->semanticalMessageStack->contains($semanticalMessageStack)) {
            $this->semanticalMessageStack->removeElement($semanticalMessageStack);
        }

        return $this;
    }

}
