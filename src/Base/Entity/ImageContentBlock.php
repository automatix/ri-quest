<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImageContentBlock
 *
 * @ORM\Table(name="image_content_blocks")
 * @ORM\Entity
 */
class ImageContentBlock
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
