<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Quests
 *
 * @ORM\Table(name="quests", indexes={@ORM\Index(name="fk_quest_scenario_idx", columns={"scenario_id"}), @ORM\Index(name="fk_quest_concrete_process_idx", columns={"concrete_process_id"})})
 * @ORM\Entity
 */
class Quests
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var ConcreteProcesses
     *
     * @ORM\ManyToOne(targetEntity="ConcreteProcesses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="concrete_process_id", referencedColumnName="id")
     * })
     */
    private $concreteProcess;

    /**
     * @var Scenarios
     *
     * @ORM\ManyToOne(targetEntity="Scenarios")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="scenario_id", referencedColumnName="id")
     * })
     */
    private $scenario;


}
