<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConcreteProcesses
 *
 * @ORM\Table(name="concrete_processes", indexes={@ORM\Index(name="fk_concrete_process_concrete_process_idx", columns={"parent_id"})})
 * @ORM\Entity
 */
class ConcreteProcesses
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
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=0, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=0, nullable=false, options={"default"="unknown"})
     */
    private $state = 'unknown';

    /**
     * @var ConcreteProcesses
     *
     * @ORM\ManyToOne(targetEntity="ConcreteProcesses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * })
     */
    private $parent;


}
