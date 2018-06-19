<?php

namespace App\Base\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ProcessMessageStack
 *
 * @ORM\Table(name="process_message_stacks")
 * @ORM\Entity
 */
class ProcessMessageStack extends MessageStack
{
    /**
     * @var string
     *
     * @ORM\Column(name="processx", type="string", length=0, nullable=false)
     */
    private $processx;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=0, nullable=false)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="event", type="string", length=0, nullable=false)
     */
    private $event;

    public function getProcessx(): ?string
    {
        return $this->processx;
    }

    public function setProcessx(string $processx): self
    {
        $this->processx = $processx;

        return $this;
    }

    public function getState(): ?string
    {
        return $this->state;
    }

    public function setState(string $state): self
    {
        $this->state = $state;

        return $this;
    }

    public function getEvent(): ?string
    {
        return $this->event;
    }

    public function setEvent(string $event): self
    {
        $this->event = $event;

        return $this;
    }

}
