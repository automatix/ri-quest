<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LinkContentBlock
 *
 * @ORM\Table(name="link_content_blocks")
 * @ORM\Entity
 */
class LinkContentBlock
{

    public function getId(): ?ContentBlock
    {
        return $this->id;
    }

    public function setId(?ContentBlock $id): self
    {
        $this->id = $id;

        return $this;
    }


}
