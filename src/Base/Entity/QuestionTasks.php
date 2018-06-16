<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuestionTasks
 *
 * @ORM\Table(name="question_tasks")
 * @ORM\Entity
 */
class QuestionTasks
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="text", type="string", length=50, nullable=true)
     */
    private $text;

    /**
     * @var Tasks
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Tasks")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;


}
