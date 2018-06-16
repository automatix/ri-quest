<?php

namespace App\Base\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ProcessMessageStacks
 *
 * @ORM\Table(name="process_message_stacks")
 * @ORM\Entity
 */
class ProcessMessageStacks
{
    /**
     * @var string
     *
     * @ORM\Column(name="processx", type="string", length=0, nullable=false)
     */
    private $processx;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=0, nullable=false)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="event", type="string", length=0, nullable=false)
     */
    private $event;

    /**
     * @var \MessageStacks
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="MessageStacks")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Processes", mappedBy="processMessageStack")
     */
    private $process;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->process = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
