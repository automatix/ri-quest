<?php
namespace App\Base\Entity\Plans\Steps;

use App\Base\Entity\Plans\AbstractStepPlan;
use App\Base\Enums\Entities\StepType;
use Doctrine\ORM\Mapping as ORM;

/**
 * InfoStep
 *
 * @ORM\Table(name="info_step_plans")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Plans\Steps\InfoStepPlanRepository")
 */
class InfoStepPlan extends AbstractStepPlan
{

    /**
     * InfoStep constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setStepType(StepType::INFO());
    }

}
