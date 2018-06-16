<?php
namespace App\Interop\Website\Controller;

use App\Base\Entity\Bar1;
use App\Base\Entity\Buz1;
use App\Base\Entity\MessageStack;
use App\Base\Enums\Processes\EventNames\EventName;
use App\Base\Enums\Processes\Events\GenericEvent;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestController extends Controller
{

    /** @var EventDispatcherInterface */
    private $eventDispatcher;
    /** @var EntityManager */
    private $entityManager;

    /**
     * QuestController constructor.
     *
     * @param EventDispatcherInterface $eventDispatcher
     */
    public function __construct(EventDispatcherInterface $eventDispatcher, EntityManagerInterface $entityManager)
    {
        $this->eventDispatcher = $eventDispatcher;
        $this->entityManager = $entityManager;
    }

    /**
     * @param Request $request
     * @return Response
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function processUserMessageAction(Request $request)
    {
        /*
        $message = $request->get('message');
        $this->eventDispatcher->dispatch(EventName::USER_MESSAGE_RECEIVED, new GenericEvent($message));
        */

//        $test = (new MessageStack())
//            ->setContext('Route_STARTED')
//        ;
//        $this->entityManager->persist($test);
//        $this->entityManager->flush();

//        $bar1 = (new Bar1())
//            ->setBar1('lorem...')
//        ;
//        $this->entityManager->persist($bar1);
        $buz1 = (new Buz1())
            ->setBuz1('lorem...')
        ;
        $this->entityManager->persist($buz1);
        $this->entityManager->flush();

        return new Response();
    }

}
