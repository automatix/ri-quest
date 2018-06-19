<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ContentBlock
 *
 * @ORM\Table(name="content_blocks", indexes={@ORM\Index(name="fk_content_block_message_idx", columns={"message_id"})})
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string", columnDefinition="ENUM('text', 'image', 'link', 'audio', 'video')")
 * @ORM\DiscriminatorMap({
 *     "text" = "TextContentBlock",
 *     "image" = "ImageContentBlock",
 *     "link" = "LinkContentBlock",
 *     "audio" = "AudioContentBlock",
 *     "video" = "VideoContentBlock"
 * })
 */
abstract class ContentBlock extends AbstractEntity
{

    /**
     * @var bool|null
     *
     * @ORM\Column(name="`order`", type="boolean", nullable=true)
     */
    private $order;

    /**
     * @var Message
     *
     * @ORM\ManyToOne(targetEntity="Message")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="message_id", referencedColumnName="id")
     * })
     */
    private $message;



    public function getOrder(): ?bool
    {
        return $this->order;
    }

    public function setOrder(?bool $order): self
    {
        $this->order = $order;

        return $this;
    }

    public function getMessage(): ?Message
    {
        return $this->message;
    }

    public function setMessage(?Message $message): self
    {
        $this->message = $message;

        return $this;
    }


}
