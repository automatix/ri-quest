<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TaskStep
 *
 * @ORM\Table(name="task_steps")
 * @ORM\Entity
 */
class TaskStep
{

    public function getId(): ?Step
    {
        return $this->id;
    }

    public function setId(?Step $id): self
    {
        $this->id = $id;

        return $this;
    }


}
