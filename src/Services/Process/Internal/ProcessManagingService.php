<?php
namespace App\Services\Process\Internal;

use App\Base\Entity\AbstractConcreteProcess;
use App\Base\Entity\Chat;
use App\Base\Enums\ProcessName;
use App\Base\Enums\ProcessStates\AccessState;
use App\Base\Enums\ProcessStates\CompletionState;
use App\Base\Enums\ProcessStates\PoiState;
use App\Base\Enums\ProcessStates\ScenarioState;
use App\Base\Enums\ProcessStates\StepState;
use App\Base\Enums\ProcessStates\WorkflowState;
use App\Services\Process\ProcessManagingServiceInterface;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @package App\Services\Process\Internal
 * @author Ilya Khanataev <contact@mevatex.com>
 */
class ProcessManagingService implements ProcessManagingServiceInterface
{

    /**
     * @param Chat $chat
     * @return AbstractConcreteProcess
     */
    public function detectProperProcess(?Chat $chat): AbstractConcreteProcess
    {
        // todo Implement the method!
        /*
        IF Chat exists
            IF there is an active Workflow assigned to it
            THEN handler the message within the Workflow process
            ELSE handle the message within the Access process
        ELSE
            create Chat
            handle the message within the Access process
        */
    }

    /** @var EntityManager */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function detectProcessState(ProcessName $processName)
    {
        $processState = null;
        switch ($processName) {
            case ProcessName::ACCESS():
                $processState = $this->detectAccessState();
                break;
            case ProcessName::COMPLETION():
                $processState = $this->detectCompletionState();
                break;
            case ProcessName::POI():
                $processState = $this->detectPoiState();
                break;
            case ProcessName::SCENARIO():
                $processState = $this->detectScenarioState();
                break;
            case ProcessName::STEP():
                $processState = $this->detectStepState();
                break;
            case ProcessName::WORKFLOW():
                $processState = $this->detectWorkflowState();
                break;
        }
        return $processState;
    }

    private function detectAccessState()
    {
        // @todo remove the static dummy return value and implement the method!
        return AccessState::STARTED();
    }

    private function detectCompletionState()
    {
        // @todo remove the static dummy return value and implement the method!
        return CompletionState::STARTED();
    }

    private function detectPoiState()
    {
        // @todo remove the static dummy return value and implement the method!
        return PoiState::STARTED();
    }

    private function detectScenarioState()
    {
        // @todo remove the static dummy return value and implement the method!
        return ScenarioState::STARTED();
    }

    private function detectStepState()
    {
        // @todo remove the static dummy return value and implement the method!
        return StepState::STARTED();
    }

    private function detectWorkflowState()
    {
        // @todo remove the static dummy return value and implement the method!
        return WorkflowState::STARTED();
    }

    /**
     * @inheritdoc
     */
    public function detectFullState()
    {
        return null;
    }

}
