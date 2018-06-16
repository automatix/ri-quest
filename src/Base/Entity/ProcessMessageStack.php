<?php

namespace App\Base\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * ProcessMessageStack
 *
 * @ORM\Table(name="process_message_stacks")
 * @ORM\Entity
 */
class ProcessMessageStack
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
     * @var MessageStack
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="MessageStack")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id", referencedColumnName="id")
     * })
     */
    private $id;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="Process", mappedBy="processMessageStack")
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
