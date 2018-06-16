<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * LinkContentBlocks
 *
 * @ORM\Table(name="link_content_blocks")
 * @ORM\Entity
 */
class LinkContentBlocks
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="text", type="string", length=1000, nullable=true)
     */
    private $text;

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
