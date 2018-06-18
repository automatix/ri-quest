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
 */
class Task
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

}
