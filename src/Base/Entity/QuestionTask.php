<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuestionTask
 *
 * @ORM\Table(name="question_tasks")
 * @ORM\Entity
 */
class QuestionTask
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="text", type="string", length=50, nullable=true)
     */
    private $text;

    /**
     * @var Task
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Task")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;


}
