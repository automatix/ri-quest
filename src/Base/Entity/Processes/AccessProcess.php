<?php
namespace App\Base\Entity\Processes;

use App\Base\Entity\AbstractProcess;
use Doctrine\ORM\Mapping as ORM;

/**
 * AccessProcess
 *
 * @ORM\Table(name="access_concrete_processes")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Processes\AccessProcessRepository")
 */
class AccessProcess extends AbstractProcess
{

}
