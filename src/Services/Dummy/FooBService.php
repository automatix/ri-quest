<?php
namespace App\Services\Dummy;

class FooBService implements FooServiceInterface
{

    /** @var BarService */
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
