<?php
namespace App\Base\Entity\Processes;

use App\Base\Entity\AbstractProcess;
use Doctrine\ORM\Mapping as ORM;

/**
 * CompletionProcess
 *
 * @ORM\Table(name="completion_processes")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Processes\CompletionProcessRepository")
 */
class CompletionProcess extends AbstractProcess
{

}
