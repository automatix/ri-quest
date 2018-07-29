<?php
namespace App\Base\Entity\Tasks;

use App\Base\Entity\AbstractTask;
use Doctrine\ORM\Mapping as ORM;

/**
 * FunTask
 *
 * @ORM\Table(name="fun_tasks")
 * @ORM\Entity(repositoryClass="App\Base\Repositories\Tasks\FunTaskRepository")
 */
class FunTask extends AbstractTask
{

}
