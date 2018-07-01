<?php
namespace App\Base\Entity;

use App\Base\Entity\MessageStacks\SemanticalAbstractMessageStack;
use App\Base\Entity\Tasks\QuestionAbstractTask;
use App\Base\Enums\Entities\AnswerType;
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
     * @ORM\Column(name="`type`", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var QuestionAbstractTask
     *
     * @ORM\ManyToOne(targetEntity="QuestionAbstractTask", inversedBy="answers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="question_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $questionTask;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="SemanticalAbstractMessageStack")
     * @ORM\JoinTable(name="answers_semantical_message_stacks",
     *   joinColumns={
     *     @ORM\JoinColumn(name="answer_id", referencedColumnName="id")
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
        return new AnswerType($this->type);
    }

    public function setType(?AnswerType $type): self
    {
        $this->type = $type->getValue();
        return $this;
    }

    public function getQuestionTask(): ?QuestionAbstractTask
    {
        return $this->questionTask;
    }

    public function setQuestionTask(?QuestionAbstractTask $questionTask): self
    {
        $this->questionTask = $questionTask;
        return $this;
    }

    /**
     * @return Collection|SemanticalAbstractMessageStack[]
     */
    public function getSemanticalMessageStacks(): Collection
    {
        return $this->semanticalMessageStacks;
    }

    public function addSemanticalMessageStack(SemanticalAbstractMessageStack $semanticalMessageStack): self
    {
        if (!$this->semanticalMessageStacks->contains($semanticalMessageStack)) {
            $this->semanticalMessageStacks[] = $semanticalMessageStack;
        }
        return $this;
    }

    public function removeSemanticalMessageStack(SemanticalAbstractMessageStack $semanticalMessageStack): self
    {
        if ($this->semanticalMessageStacks->contains($semanticalMessageStack)) {
            $this->semanticalMessageStacks->removeElement($semanticalMessageStack);
        }
        return $this;
    }

}
