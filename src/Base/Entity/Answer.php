<?php
namespace App\Base\Entity;

use App\Base\Entity\MessageStacks\SemanticalMessageStack;
use App\Base\Entity\Tasks\QuestionTask;
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
     * @var QuestionTask
     *
     * @ORM\ManyToOne(targetEntity="App\Base\Entity\Tasks\QuestionTask", inversedBy="answers")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="question_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $questionTask;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="App\Base\Entity\MessageStacks\SemanticalMessageStack")
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

    public function getQuestionTask(): ?QuestionTask
    {
        return $this->questionTask;
    }

    public function setQuestionTask(?QuestionTask $questionTask): self
    {
        $this->questionTask = $questionTask;
        return $this;
    }

    /**
     * @return Collection|SemanticalMessageStack[]
     */
    public function getSemanticalMessageStacks(): Collection
    {
        return $this->semanticalMessageStacks;
    }

    public function addSemanticalMessageStack(SemanticalMessageStack $semanticalMessageStack): self
    {
        if (!$this->semanticalMessageStacks->contains($semanticalMessageStack)) {
            $this->semanticalMessageStacks[] = $semanticalMessageStack;
        }
        return $this;
    }

    public function removeSemanticalMessageStack(SemanticalMessageStack $semanticalMessageStack): self
    {
        if ($this->semanticalMessageStacks->contains($semanticalMessageStack)) {
            $this->semanticalMessageStacks->removeElement($semanticalMessageStack);
        }
        return $this;
    }

}
