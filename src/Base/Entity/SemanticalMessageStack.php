<?php

namespace App\Base\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * SemanticalMessageStack
 *
 * @ORM\Table(name="semantical_message_stacks")
 * @ORM\Entity
 */
class SemanticalMessageStack
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="semantic", type="string", length=0, nullable=true)
     */
    private $semantic;

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
     * @ORM\ManyToMany(targetEntity="Answer", mappedBy="semanticalMessageStack")
     */
    private $answer;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="Task", mappedBy="semanticalMessageStack")
     */
    private $task;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->answer = new \Doctrine\Common\Collections\ArrayCollection();
        $this->task = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
