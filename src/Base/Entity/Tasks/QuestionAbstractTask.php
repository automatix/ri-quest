<?php
namespace App\Base\Entity\Tasks;

use App\Base\Entity\Answer;
use App\Base\Entity\AbstractTask;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * QuestionTask
 *
 * @ORM\Table(name="question_tasks")
 * @ORM\Entity
 */
class QuestionAbstractTask extends AbstractTask
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="text", type="string", length=50, nullable=false)
     */
    private $text;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="App\Base\Entity\Answer", mappedBy="questionTask")
     */
    private $answers;

    public function __construct()
    {
        parent::__construct();
        $this->answers = new ArrayCollection();
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;
        return $this;
    }

    public function getAnswers(): Collection
    {
        return $this->answers;
    }

    public function addAnswer(Answer $answer): self
    {
        if (!$this->answers->contains($answer)) {
            $this->answers[] = $answer;
        }
        return $this;
    }

    public function removeAnswer(Answer $answer): self
    {
        if ($this->answers->contains($answer)) {
            $this->answers->removeElement($answer);
        }
        return $this;
    }

}
