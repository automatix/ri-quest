<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlaceStep
 *
 * @ORM\Table(name="place_steps")
 * @ORM\Entity
 */
class PlaceStep
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
