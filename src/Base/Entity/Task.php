<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Task
 *
 * @ORM\Table(name="tasks", indexes={@ORM\Index(name="fk_task_task_step_idx", columns={"task_steps_id"}), @ORM\Index(name="fk_task_message_stack_idx", columns={"message_stack_id"})})
 * @ORM\Entity
 */
class Task
{

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
     * @var TaskStep
     *
     * @ORM\ManyToOne(targetEntity="TaskStep")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="task_steps_id", referencedColumnName="id")
     * })
     */
    private $taskSteps;

    public function getMessageStack(): ?MessageStack
    {
        return $this->messageStack;
    }

    public function setMessageStack(?MessageStack $messageStack): self
    {
        $this->messageStack = $messageStack;

        return $this;
    }

    public function getTaskSteps(): ?TaskStep
    {
        return $this->taskSteps;
    }

    public function setTaskSteps(?TaskStep $taskSteps): self
    {
        $this->taskSteps = $taskSteps;

        return $this;
    }


}
