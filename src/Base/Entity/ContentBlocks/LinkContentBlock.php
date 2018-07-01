<?php
namespace App\Base\Entity\ContentBlocks;

use App\Base\Entity\AbstractContentBlock;
use Doctrine\ORM\Mapping as ORM;

/**
 * LinkContentBlock
 *
 * @ORM\Table(name="link_content_blocks")
 * @ORM\Entity
 */
class LinkContentBlock extends AbstractContentBlock
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="text", type="string", length=1000, nullable=true)
     */
    private $text;

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): self
    {
        $this->text = $text;
        return $this;
    }
}
