<?php
namespace App\Services\Dummy;

class FooService implements FooServiceInterface
{

    /** @var BarService */
    private $barbarService;

    public function __construct(BarService $barService)
    {
        $this->barbarService = $barService;
    }

    public function foo()
    {
        $this->barbarService->bar();
    }

}
