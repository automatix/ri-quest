<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TaskSteps
 *
 * @ORM\Table(name="task_steps")
 * @ORM\Entity
 */
class TaskSteps
{
    /**
     * @var string
     *
     * @ORM\Column(name="step_type", type="string", length=0, nullable=false)
     */
    private $stepType;

    /**
     * @var \Processes
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Processes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;


}
