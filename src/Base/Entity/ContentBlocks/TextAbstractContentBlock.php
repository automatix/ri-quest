<?php
namespace App\Base\Entity\ContentBlocks;

use App\Base\Entity\AbstractContentBlock;
use Doctrine\ORM\Mapping as ORM;

/**
 * TextContentBlock
 *
 * @ORM\Table(name="text_content_blocks")
 * @ORM\Entity
 */
class TextAbstractContentBlock extends AbstractContentBlock
{
    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=1000, nullable=false)
     */
    private $text;

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;
        return $this;
    }
}
