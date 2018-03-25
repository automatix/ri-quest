<?php
namespace App\Interop\Website\Controller;

use App\Services\Dummy\FooAService;
use App\Services\Dummy\FooServiceInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{

    private $fooService;

    public function __construct(FooServiceInterface $fooService)
    {
        $this->fooService = $fooService;
    }

    /**
     * @Route("/", name="index")
     */
    public function indexAction()
    {
        $this->fooService->foo();

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }

}
