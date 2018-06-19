<?php

namespace App\Base\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Answer
 *
 * @ORM\Table(name="answers", indexes={@ORM\Index(name="fk_answer_question_idx", columns={"question_id"})})
 * @ORM\Entity
 */
class Answer extends AbstractEntity
{

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
     * @var QuestionTask
     *
     * @ORM\ManyToOne(targetEntity="QuestionTask")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     * })
     */
    private $question;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="SemanticalMessageStack")
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
        $this->semanticalMessageStack = new ArrayCollection();
    }



    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getQuestion(): ?QuestionTask
    {
        return $this->question;
    }

    public function setQuestion(?QuestionTask $question): self
    {
        $this->question = $question;

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
