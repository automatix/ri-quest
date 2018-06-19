<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * QuestionTask
 *
 * @ORM\Table(name="question_tasks")
 * @ORM\Entity
 */
class QuestionTask extends Task
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="text", type="string", length=50, nullable=true)
     */
    private $text;

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;

        return $this;
    }


}
