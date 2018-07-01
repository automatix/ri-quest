<?php
namespace App\Base\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="messages", indexes={@ORM\Index(name="fk_message_message_stack_idx", columns={"message_stack_id"})})
 * @ORM\Entity
 */
class Message extends AbstractEntity
{

    /**
     * @var int
     *
     * @ORM\Column(name="`order`", type="integer", nullable=false)
     */
    private $order;

    /**
     * @var MessageStack
     *
     * @ORM\ManyToOne(targetEntity="MessageStack", inversedBy="messages")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="message_stack_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $messageStack;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="App\Base\Entity\ContentBlock", mappedBy="message")
     */
    private $contentBlocks;

    public function __construct()
    {
        parent::__construct();
        $this->contentBlocks = new ArrayCollection();
    }

    public function getOrder(): ?int
    {
        return $this->order;
    }

    public function setOrder(?int $order): self
    {
        $this->order = $order;
        return $this;
    }

    public function getMessageStack(): ?MessageStack
    {
        return $this->messageStack;
    }

    public function setMessageStack(?MessageStack $messageStack): self
    {
        $this->messageStack = $messageStack;
        return $this;
    }

    public function getContentBlocks(): Collection
    {
        return $this->contentBlocks;
    }

    public function addContentBlock(ContentBlock $contentBlock): self
    {
        if (!$this->contentBlocks->contains($contentBlock)) {
            $this->contentBlocks[] = $contentBlock;
        }
        return $this;
    }

    public function removeContentBlock(ContentBlock $contentBlock): self
    {
        if ($this->contentBlocks->contains($contentBlock)) {
            $this->contentBlocks->removeElement($contentBlock);
        }
        return $this;
    }

}
