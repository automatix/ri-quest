<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AudioContentBlock
 *
 * @ORM\Table(name="audio_content_blocks")
 * @ORM\Entity
 */
class AudioContentBlock
{
    /**
     * @var ContentBlock
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="ContentBlock")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

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
