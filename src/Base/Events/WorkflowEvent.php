<?php
namespace App\Base\Events;

use App\Base\Entity\Processes\WorkflowProcess;
use App\Base\Exceptions\GeneralErrorContextCode;
use App\Base\Exceptions\GeneralException;

class WorkflowEvent extends GenericEvent
{

    /** @var WorkflowProcess */
    private $workflowProcess;
    /** @var string */
    private $message;

    /**
     * WorkflowEvent constructor.
     *
     * @param WorkflowProcess $subject
     * @param array $arguments May contain a message in the element with the key 'message'.
     * @throws GeneralException
     */
    public function __construct($subject = null, ?array $arguments = [])
    {
        if (! ($subject instanceof WorkflowProcess)) {
            throw new GeneralException('', GeneralErrorContextCode::INVALID_ARGUMENT());
        }
        parent::__construct($subject, $arguments);
        $this->workflowProcess = $subject;
        $this->message = isset($arguments['message']) && is_string($arguments['message'])
            ? $this->message = $arguments['message']
            : null
        ;
    }

    /**
     * @return WorkflowProcess
     */
    public function getWorkflowProcess(): WorkflowProcess
    {
        return $this->workflowProcess;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

}
