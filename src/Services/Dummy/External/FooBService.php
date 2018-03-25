<?php
namespace App\Services\Dummy\External;

use App\Services\Dummy\Internal\BarServiceInterface;

class FooBService implements FooServiceInterface
{

    /** @var BarServiceInterface */
    private $barService;

    public function __construct(BarServiceInterface $barService)
    {
        $this->barService = $barService;
    }

    public function foo()
    {
        $this->barService->bar();
    }

}
