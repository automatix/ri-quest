<?php

namespace App\Base\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Answers
 *
 * @ORM\Table(name="answers", indexes={@ORM\Index(name="fk_answer_question_idx", columns={"question_id"})})
 * @ORM\Entity
 */
class Answers
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
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=50, nullable=false)
     */
    private $text;

    /**
     * @var string|null
     *
     * @ORM\Column(name="type", type="string", length=0, nullable=true)
     */
    private $type;

    /**
     * @var QuestionTasks
     *
     * @ORM\ManyToOne(targetEntity="QuestionTasks")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     * })
     */
    private $question;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="SemanticalMessageStacks", inversedBy="answer")
     * @ORM\JoinTable(name="answers_semantical_message_stacks",
     *   joinColumns={
     *     @ORM\JoinColumn(name="answer_id", referencedColumnName="id")
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
