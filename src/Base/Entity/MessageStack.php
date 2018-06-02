<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MessageStack
 *
 * @ORM\Table(name="message_stacks")
 * @ORM\Entity
 */
class MessageStack
{

    /**
     * @var string|null
     *
     * @ORM\Column(name="context", type="string", length=0, nullable=true)
     */
    private $context;

    public function getContext(): ?string
    {
        return $this->context;
    }

    public function setContext(?string $context): self
    {
        $this->context = $context;

        return $this;
    }


}
