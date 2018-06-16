<?php

namespace App\Base\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Process
 *
 * @ORM\Table(name="processes", uniqueConstraints={@ORM\UniqueConstraint(name="uq_unique_order_for_process", columns={"parent_id", "order"})}, indexes={@ORM\Index(name="fk_process_process_idx", columns={"parent_id"})})
 * @ORM\Entity
 */
class Process
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
     * @var bool
     *
     * @ORM\Column(name="order", type="boolean", nullable=false)
     */
    private $order;

    /**
     * @var Process
     *
     * @ORM\ManyToOne(targetEntity="Process")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * })
     */
    private $parent;

    /**
     * @var Collection
     *
     * @ORM\ManyToMany(targetEntity="ProcessMessageStack", inversedBy="process")
     * @ORM\JoinTable(name="process_process_message_stack",
     *   joinColumns={
     *     @ORM\JoinColumn(name="process_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="process_message_stack_id", referencedColumnName="id")
     *   }
     * )
     */
    private $processMessageStack;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->processMessageStack = new ArrayCollection();
    }

}
