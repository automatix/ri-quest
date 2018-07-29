<?php
namespace App\Base\Entity\Processes\Steps;

use App\Base\Entity\Processes\Step;
use App\Base\Enums\Entities\StepType;
use Doctrine\ORM\Mapping as ORM;

/**
 * InfoStep
 *
 * @ORM\Table(name="info_steps")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Processes\Steps\InfoStepRepository")
 */
class InfoStep extends Step
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
