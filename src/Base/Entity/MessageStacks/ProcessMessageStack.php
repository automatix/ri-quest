<?php
namespace App\Base\Entity\MessageStacks;

use App\Base\Entity\MessageStack;
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
     * @ORM\Column(name="process", type="string", length=255, nullable=false)
     */
    private $process;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255, nullable=false)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="event", type="string", length=255, nullable=false)
     */
    private $event;

    public function getProcess(): ?string
    {
        return $this->process;
    }

    public function setProcess(string $process): self
    {
        $this->process = $process;
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
