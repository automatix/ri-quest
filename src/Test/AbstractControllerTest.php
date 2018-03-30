<?php
namespace App\Test;

use PHPUnit\DbUnit\TestCaseTrait;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

/**
 * Class AbstractControllerTest
 *
 * @package App\Test
 */
abstract class AbstractControllerTest extends KernelTestCase
{

    use TestCaseTrait;

}
