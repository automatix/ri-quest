<?php
namespace App\Base\Entity\Plans\Steps;

use App\Base\Entity\Plans\AbstractStepPlan;
use App\Base\Enums\Entities\StepType;
use Doctrine\ORM\Mapping as ORM;

/**
 * TaskStep
 *
 * @ORM\Table(name="task_steps")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Processes\Steps\TaskStepRepository")
 */
class TaskStepPlan extends AbstractStepPlan
{

    /**
     * TaskStep constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setStepType(StepType::TASK());
    }

}
