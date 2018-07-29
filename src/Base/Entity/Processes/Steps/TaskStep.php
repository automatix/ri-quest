<?php
namespace App\Base\Entity\Processes\Steps;

use App\Base\Entity\Processes\Step;
use App\Base\Enums\Entities\StepType;
use Doctrine\ORM\Mapping as ORM;

/**
 * TaskStep
 *
 * @ORM\Table(name="task_steps")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Processes\Steps\TaskStepRepository")
 */
class TaskStep extends Step
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
