<?php

namespace App\Base\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tasks
 *
 * @ORM\Table(name="tasks", indexes={@ORM\Index(name="fk_task_task_step_idx", columns={"task_step_id"})})
 * @ORM\Entity
 */
class Tasks
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
     * @var TaskSteps
     *
     * @ORM\ManyToOne(targetEntity="TaskSteps")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_step_id", referencedColumnName="id")
     * })
     */
    private $taskStep;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="SemanticalMessageStacks", inversedBy="task")
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
        $this->semanticalMessageStack = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
