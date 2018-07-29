<?php
namespace App\Base\Entity\Processes\Steps;

use App\Base\Entity\Processes\AbstractStep;
use App\Base\Enums\Entities\StepType;
use Doctrine\ORM\Mapping as ORM;

/**
 * InfoStep
 *
 * @ORM\Table(name="info_steps")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Processes\Steps\InfoStepRepository")
 */
class InfoStep extends AbstractStep
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
