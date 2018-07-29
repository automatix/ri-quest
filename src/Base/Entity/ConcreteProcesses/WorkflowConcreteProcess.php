<?php
namespace App\Base\Entity\ConcreteProcesses;

use App\Base\Entity\AbstractConcreteProcess;
use App\Base\Entity\Chat;
use App\Base\Entity\Processes\Workflow;
use Doctrine\ORM\Mapping as ORM;

/**
 * WorkflowConcreteProcess
 *
 * @ORM\Table(name="workflow_concrete_processes", indexes={
 *     @ORM\Index(name="fk_workflow_concrete_process_workflow_idx", columns={"workflow_id"}),
 *     @ORM\Index(name="fk_workflow_concrete_process_chat_idx", columns={"chat_id"})
 * })
 * @ORM\Entity(repositoryClass="App\Base\Repositories\ConcreteProcesses\WorkflowConcreteProcessRepository")
 */
class WorkflowConcreteProcess extends AbstractConcreteProcess
{

    /**
     * @var Workflow
     *
     * @ORM\ManyToOne(targetEntity="App\Base\Entity\Processes\Workflow")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="workflow_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $workflow;

    /**
     * @var Chat
     *
     * @ORM\ManyToOne(targetEntity="App\Base\Entity\Chat", inversedBy="workflowConcreteProcesses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="chat_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $chat;

    public function getWorkflow(): ?Workflow
    {
        return $this->workflow;
    }

    public function setWorkflow(?Workflow $workflow): self
    {
        $this->workflow = $workflow;
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

}
