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
    /**
     * @var string
     *
     * @ORM\Column(name="src", type="string", length=1000, nullable=false)
     */
    private $src;

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


}
