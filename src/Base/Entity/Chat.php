<?php
namespace App\Base\Entity;

use App\Base\Entity\Tasks\QuestionTask;
use App\Base\Enums\Entities\AnswerType;
use App\Base\Enums\Entities\Gender;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Chat
 *
 * @ORM\Table(name="chats", indexes={@ORM\Index(name="fk_chat_user_idx", columns={"user_id"})})
 * @ORM\Entity
 */
class Chat extends AbstractEntity
{

    /**
     * @var string|null
     *
     * @ORM\Column(name="`type`", type="string", length=255, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="identifier", type="string", length=50, nullable=true)
     */
    private $identifier;

    /**
     * @var Collection
     *
     * @ORM\ManyToOne(targetEntity="App\Base\Entity\User", inversedBy="chats")
     */
    private $user;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="App\Base\Entity\Quest", mappedBy="chat")
     */
    private $quests;

    public function __construct()
    {
        parent::__construct();
        $this->quests = new ArrayCollection();
    }

    public function getIdentifier(): ?string
    {
        return $this->identifier;
    }

    public function setIdentifier(string $identifier): self
    {
        $this->identifier = $identifier;
        return $this;
    }

    public function getUser(): Collection
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function addQuest(Quest $quest): self
    {
        if (!$this->quests->contains($quest)) {
            $this->quests[] = $quest;
        }
        return $this;
    }

    public function removeQuest(Quest $quest): self
    {
        if ($this->quests->contains($quest)) {
            $this->quests->removeElement($quest);
        }
        return $this;
    }

}
