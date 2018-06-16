<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * VideoContentBlocks
 *
 * @ORM\Table(name="video_content_blocks")
 * @ORM\Entity
 */
class VideoContentBlocks
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="src", type="string", length=1000, nullable=true)
     */
    private $src;

    /**
     * @var \ContentBlocks
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="ContentBlocks")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;


}
