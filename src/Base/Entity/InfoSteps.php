<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * InfoSteps
 *
 * @ORM\Table(name="info_steps")
 * @ORM\Entity
 */
class InfoSteps
{
    /**
     * @var string
     *
     * @ORM\Column(name="step_type", type="string", length=0, nullable=false)
     */
    private $stepType;

    /**
     * @var Processes
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="Processes")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;


}
