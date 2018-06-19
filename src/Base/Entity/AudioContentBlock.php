<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AudioContentBlock
 *
 * @ORM\Table(name="audio_content_blocks")
 * @ORM\Entity
 */
class AudioContentBlock extends ContentBlock
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="src", type="string", length=1000, nullable=true)
     */
    private $src;

    public function getSrc(): ?string
    {
        return $this->src;
    }

    public function setSrc(?string $src): self
    {
        $this->src = $src;

        return $this;
    }


}
