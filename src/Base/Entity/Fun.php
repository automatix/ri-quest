<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Fun
 *
 * @ORM\Table(name="funs")
 * @ORM\Entity
 */
class Fun
{

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
