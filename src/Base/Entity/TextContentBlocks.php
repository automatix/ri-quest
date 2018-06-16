<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TextContentBlocks
 *
 * @ORM\Table(name="text_content_blocks")
 * @ORM\Entity
 */
class TextContentBlocks
{
    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=1000, nullable=false)
     */
    private $text;

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
