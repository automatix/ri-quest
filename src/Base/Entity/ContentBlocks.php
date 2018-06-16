<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContentBlocks
 *
 * @ORM\Table(name="content_blocks", indexes={@ORM\Index(name="fk_content_block_message_idx", columns={"message_id"})})
 * @ORM\Entity
 */
class ContentBlocks
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="order", type="boolean", nullable=true)
     */
    private $order;

    /**
     * @var \Messages
     *
     * @ORM\ManyToOne(targetEntity="Messages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="message_id", referencedColumnName="id")
     * })
     */
    private $message;


}
