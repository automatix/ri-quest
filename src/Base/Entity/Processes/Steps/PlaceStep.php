<?php
namespace App\Base\Entity\Processes\Steps;

use App\Base\Entity\Processes\Step;
use App\Base\Enums\Entities\StepType;
use Doctrine\ORM\Mapping as ORM;

/**
 * PlaceStep
 *
 * @ORM\Table(name="place_steps")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Processes\Steps\PlaceStepRepository")
 */
class PlaceStep extends Step
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
