<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TextContentBlock
 *
 * @ORM\Table(name="text_content_blocks")
 * @ORM\Entity
 */
class TextContentBlock
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
