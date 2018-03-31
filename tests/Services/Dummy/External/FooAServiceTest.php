<?php
namespace Services\Dummy\External;

use App\Test\AbstractControllerTest;
use App\Test\ArrayDataSet;
use DateTime;
use PHPUnit\DbUnit\DataSet\IDataSet;

class FooAServiceTest extends AbstractControllerTest
{

    public function testDummy()
    {
        $this->assertTrue(true);
    }

    /**
     * Returns the test dataset.
     *
     * @return IDataSet
     */
    protected function getDataSet()
    {
        return new ArrayDataSet([
            'foo' => [
                [
                    'id' => 3,
                    'name' => 'Foo 3',
                    'created' => (new DateTime('now'))->format('Y-m-d H:i:s'),
                    'updated' => (new DateTime('now'))->format('Y-m-d H:i:s'),
                    'version' => 2,
                ],
            ],
        ]);
    }

}
