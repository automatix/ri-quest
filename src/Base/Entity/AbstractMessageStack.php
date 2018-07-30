<?php
namespace App\Base\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * AbstractMessageStack
 *
 * @ORM\Table(name="message_stacks")
 * @ORM\Entity
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="type", type="string")
 * @ORM\DiscriminatorMap({
 *     "plan" = "App\Base\Entity\MessageStacks\PlanMessageStack",
 *     "semantical" = "App\Base\Entity\MessageStacks\SemanticalMessageStack"
 * })
 */
abstract class AbstractMessageStack extends AbstractEntity
{

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="App\Base\Entity\Message", mappedBy="messageStack")
     */
    private $messages;

    public function __construct()
    {
        parent::__construct();
        $this->messages = new ArrayCollection();
    }

    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages[] = $message;
        }
        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->contains($message)) {
            $this->messages->removeElement($message);
        }
        return $this;
    }

}
