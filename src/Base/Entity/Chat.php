<?php
namespace App\Base\Entity;

use App\Base\Entity\Processes\WorkflowProcess;
use App\Base\Enums\Entities\ChatType;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Chat
 *
 * @ORM\Table(name="chats",
 *     indexes={
 *         @ORM\Index(name="fk_chat_user_idx", columns={"user_id"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Base\Repositories\ChatRepository")
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
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="App\Base\Entity\User", inversedBy="chats")
     */
    private $user;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="App\Base\Entity\Processes\WorkflowProcess", mappedBy="chat")
     */
    private $workflowProcesses;

    public function __construct()
    {
        parent::__construct();
        $this->workflowProcesses = new ArrayCollection();
    }

    public function getType(): ?string
    {
        return new ChatType($this->type);
    }

    public function setType(?ChatType $type): self
    {
        $this->type = $type->getValue();
        return $this;
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

    public function getUser(): User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;
        return $this;
    }

    public function getWorkflowProcesses(): Collection
    {
        return $this->workflowProcesses;
    }

    public function addWorkflowProcess(WorkflowProcess $workflowProcess): self
    {
        if (!$this->workflowProcesses->contains($workflowProcess)) {
            $this->workflowProcesses[] = $workflowProcess;
        }
        return $this;
    }

    public function removeWorkflowProcess(WorkflowProcess $workflowProcess): self
    {
        if ($this->workflowProcesses->contains($workflowProcess)) {
            $this->workflowProcesses->removeElement($workflowProcess);
        }
        return $this;
    }

}
