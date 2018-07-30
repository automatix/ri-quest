<?php
namespace App\Base\Entity\MessageStacks;

use App\Base\Entity\AbstractMessageStack;
use Doctrine\ORM\Mapping as ORM;

/**
 * ProcessMessageStack
 *
 * @ORM\Table(name="plan_message_stacks")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\MessageStacks\PlanMessageStackRepository")
 */
class PlanMessageStack extends AbstractMessageStack
{
    /**
     * @var string
     *
     * @ORM\Column(name="plan", type="string", length=255, nullable=false)
     */
    private $plan;

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

    public function getPlan(): ?string
    {
        return $this->plan;
    }

    public function setPlan(string $plan): self
    {
        $this->plan = $plan;
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
