<?php
namespace App\Interop\Website\Controller;

use App\Services\Dummy\FooService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function indexAction(FooService $fooService)
    {
        $fooService->foo();

        return $this->render('index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
