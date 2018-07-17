<?php
namespace App\Base\Entity;

use App\Base\Enums\Entities\AnswerType;
use App\Base\Enums\Entities\Gender;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * User
 *
 * @ORM\Table(name="users")
 * @ORM\Entity
 */
class User extends AbstractEntity
{

    /**
     * @var string
     *
     * @ORM\Column(name="first_name", type="string", length=50, nullable=true)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="last_name", type="string", length=50, nullable=true)
     */
    private $lastName;

    /**
     * @var string
     *
     * @ORM\Column(name="gender", type="string", length=1, nullable=true)
     */
    private $gender;

    /**
     * @var int
     *
     * @ORM\Column(name="privacy_policy_agreed", type="boolean", nullable=false, options={"default":false})
     */
    private $privacyPolicyAgreed = false;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="App\Base\Entity\Chat", mappedBy="user")
     */
    private $chats;

    public function __construct()
    {
        parent::__construct();
        $this->chats = new ArrayCollection();
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;
        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLast(string $lastName): self
    {
        $this->lastName = $lastName;
        return $this;
    }

    public function getGender(): ?string
    {
        return new AnswerType($this->gender);
    }

    public function setGender(?Gender $gender): self
    {
        $this->type = $gender->getValue();
        return $this;
    }

    public function getPrivacyPolicyAgreed(): bool
    {
        return (bool) $this->privacyPolicyAgreed;
    }

    public function setPrivacyPolicyAgreed(bool $privacyPolicyAgreed): User
    {
        $this->privacyPolicyAgreed = (int) $privacyPolicyAgreed;
        return $this;
    }

    public function getChats(): Collection
    {
        return $this->chats;
    }

    public function addChat(Chat $chat): self
    {
        if (!$this->chats->contains($chat)) {
            $this->chats[] = $chat;
        }
        return $this;
    }

    public function removeChat(Chat $chat): self
    {
        if ($this->chats->contains($chat)) {
            $this->chats->removeElement($chat);
        }
        return $this;
    }

}
