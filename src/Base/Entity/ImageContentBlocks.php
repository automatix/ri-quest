<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ImageContentBlocks
 *
 * @ORM\Table(name="image_content_blocks")
 * @ORM\Entity
 */
class ImageContentBlocks
{
    /**
     * @var string
     *
     * @ORM\Column(name="src", type="string", length=1000, nullable=false)
     */
    private $src;

    /**
     * @var ContentBlocks
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
