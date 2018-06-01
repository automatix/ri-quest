<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VideoContentBlock
 *
 * @ORM\Table(name="video_content_blocks")
 * @ORM\Entity
 */
class VideoContentBlock
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
