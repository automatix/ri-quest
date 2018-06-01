<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="questions")
 * @ORM\Entity
 */
class Question
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

    public function getId(): ?Task
    {
        return $this->id;
    }

    public function setId(?Task $id): self
    {
        $this->id = $id;

        return $this;
    }


}
