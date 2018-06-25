<?php
namespace App\Base\Entity\Processes\Steps;

use App\Base\Entity\Processes\Step;
use App\Base\Enums\Entities\StepType;
use Doctrine\ORM\Mapping as ORM;

/**
 * TaskStep
 *
 * @ORM\Table(name="task_steps")
 * @ORM\Entity
 */
    class TaskStep extends Step
{

        /**
         * InfoStep constructor.
         */
        public function __construct()
        {
            parent::__construct();
            $this->setStepType(StepType::TASK());
        }

}
