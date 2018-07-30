<?php
namespace App\Base\Entity\Plans\Steps;

use App\Base\Entity\Plans\AbstractStepPlan;
use App\Base\Enums\Entities\StepType;
use Doctrine\ORM\Mapping as ORM;

/**
 * PlaceStep
 *
 * @ORM\Table(name="place_step_plans")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Plans\Steps\PlaceStepPlanRepository")
 */
class PlaceStepPlan extends AbstractStepPlan
{

    /**
     * PlaceStep constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setStepType(StepType::PLACE());
    }

}
