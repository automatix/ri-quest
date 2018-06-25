<?php
namespace App\Base\Entity;

use App\Base\Enums\Entities\StepType;
use Doctrine\ORM\Mapping as ORM;

/**
 * PlaceStep
 *
 * @ORM\Table(name="place_steps")
 * @ORM\Entity
 */
class PlaceStep extends Step
{

    /**
     * InfoStep constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->setStepType(StepType::PLACE());
    }

}
