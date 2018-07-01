<?php
namespace App\Base\Entity;

use App\Base\Entity\Processes\Scenario;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Quest
 *
 * @ORM\Table(name="quests", indexes={@ORM\Index(name="fk_quest_scenario_idx", columns={"scenario_id"}), @ORM\Index(name="fk_quest_chat_idx", columns={"chat_id"})})
 * @ORM\Entity
 */
class Quest extends AbstractEntity
{

    /**
     * @var Scenario
     *
     * @ORM\ManyToOne(targetEntity="App\Base\Entity\Processes\Scenario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="scenario_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $scenario;

    /**
     * @var Chat
     *
     * @ORM\ManyToOne(targetEntity="App\Base\Entity\Chat", inversedBy="quests")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="chat_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $chat;

    /**
     * @var Collection
     *
     * @ORM\OneToMany(targetEntity="App\Base\Entity\AbstractConcreteProcess", mappedBy="quest")
     */
    private $concreteProcesses;

    public function __construct()
    {
        parent::__construct();
        $this->concreteProcesses = new ArrayCollection();
    }

    public function getScenario(): ?Scenario
    {
        return $this->scenario;
    }

    public function setScenario(?Scenario $scenario): self
    {
        $this->scenario = $scenario;
        return $this;
    }

    public function getChat(): ?Chat
    {
        return $this->chat;
    }

    public function setChat(?Chat $chat): self
    {
        $this->chat = $chat;
        return $this;
    }

    public function getConcreteProcesses(): Collection
    {
        return $this->concreteProcesses;
    }

    public function addConcreteProcess(AbstractConcreteProcess $concreteProcess): self
    {
        if (!$this->concreteProcesses->contains($concreteProcess)) {
            $this->concreteProcesses[] = $concreteProcess;
        }
        return $this;
    }

    public function removeConcreteProcess(AbstractConcreteProcess $concreteProcess): self
    {
        if ($this->concreteProcesses->contains($concreteProcess)) {
            $this->concreteProcesses->removeElement($concreteProcess);
        }
        return $this;
    }

}
