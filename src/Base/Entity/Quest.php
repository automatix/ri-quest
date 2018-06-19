<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quest
 *
 * @ORM\Table(name="quests", indexes={@ORM\Index(name="fk_quest_scenario_idx", columns={"scenario_id"}), @ORM\Index(name="fk_quest_concrete_process_idx", columns={"concrete_process_id"})})
 * @ORM\Entity
 */
class Quest extends AbstractEntity
{

    /**
     * @var ConcreteProcess
     *
     * @ORM\ManyToOne(targetEntity="ConcreteProcess")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="concrete_process_id", referencedColumnName="id")
     * })
     */
    private $concreteProcess;

    /**
     * @var Scenario
     *
     * @ORM\ManyToOne(targetEntity="Scenario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="scenario_id", referencedColumnName="id")
     * })
     */
    private $scenario;



    public function getConcreteProcess(): ?ConcreteProcess
    {
        return $this->concreteProcess;
    }

    public function setConcreteProcess(?ConcreteProcess $concreteProcess): self
    {
        $this->concreteProcess = $concreteProcess;

        return $this;
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


}
