<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quest
 *
 * @ORM\Table(name="quests", indexes={@ORM\Index(name="fk_quest_scenario_idx", columns={"scenario_id"}), @ORM\Index(name="fk_quest_process_idx", columns={"process_id"})})
 * @ORM\Entity
 */
class Quest
{

    /**
     * @var Process
     *
     * @ORM\ManyToOne(targetEntity="Process")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="process_id", referencedColumnName="id")
     * })
     */
    private $process;

    /**
     * @var Scenario
     *
     * @ORM\ManyToOne(targetEntity="Scenario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="scenario_id", referencedColumnName="id")
     * })
     */
    private $scenario;

    public function getProcess(): ?Process
    {
        return $this->process;
    }

    public function setProcess(?Process $process): self
    {
        $this->process = $process;

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
