<?php
namespace App\Base\Entity\Processes;

use App\Base\Entity\AbstractProcess;
use Doctrine\ORM\Mapping as ORM;

/**
 * ScenarioProcess
 *
 * @ORM\Table(name="scenario_processes")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Processes\ScenarioProcessRepository")
 */
class ScenarioProcess extends AbstractProcess
{

}
