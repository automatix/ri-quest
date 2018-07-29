<?php
namespace App\Base\Entity\Plans\Steps;

use App\Base\Entity\Plans\AbstractStepPlan;
use App\Base\Enums\Entities\StepType;
use Doctrine\ORM\Mapping as ORM;

/**
 * PlaceStep
 *
 * @ORM\Table(name="place_steps")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Processes\Steps\PlaceStepRepository")
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
