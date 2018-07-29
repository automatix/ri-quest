<?php
namespace App\Base\Entity\Processes;

use App\Base\Entity\AbstractProcess;
use App\Base\Entity\Chat;
use App\Base\Entity\Plans\WorkflowPlan;
use Doctrine\ORM\Mapping as ORM;

/**
 * WorkflowProcess
 *
 * @ORM\Table(name="workflow_concrete_processes", indexes={
 *     @ORM\Index(name="fk_workflow_concrete_process_workflow_idx", columns={"workflow_id"}),
 *     @ORM\Index(name="fk_workflow_concrete_process_chat_idx", columns={"chat_id"})
 * })
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Processes\WorkflowProcessRepository")
 */
class WorkflowProcess extends AbstractProcess
{

    /**
     * @var WorkflowPlan
     *
     * @ORM\ManyToOne(targetEntity="App\Base\Entity\Plans\WorkflowPlan")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="workflow_id", referencedColumnName="id", nullable=true)
     * })
     */
    private $workflowPlan;

    /**
     * @var Chat
     *
     * @ORM\ManyToOne(targetEntity="App\Base\Entity\Chat", inversedBy="workflowProcesses")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="chat_id", referencedColumnName="id", nullable=false)
     * })
     */
    private $chat;

    public function getWorkflowPlan(): ?WorkflowPlan
    {
        return $this->workflowPlan;
    }

    public function setWorkflowPlan(?WorkflowPlan $workflowPlan): self
    {
        $this->workflowPlan = $workflowPlan;
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
