<?php
namespace App\Base\Entity\MessageStacks;

use App\Base\Entity\AbstractMessageStack;
use Doctrine\ORM\Mapping as ORM;

/**
 * SemanticalMessageStack
 *
 * @ORM\Table(name="semantical_message_stacks")
 * @ORM\Entity
 */
class SemanticalMessageStack extends AbstractMessageStack
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="semantic", type="string", length=255, nullable=false)
     */
    private $semantic;

    public function getSemantic(): ?string
    {
        return $this->semantic;
    }

    public function setSemantic(?string $semantic): self
    {
        $this->semantic = $semantic;
        return $this;
    }

}
