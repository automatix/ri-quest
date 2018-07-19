<?php
namespace App\Interop\Website\Controller;

use App\Base\Entity\Processes\Steps\InfoStep;
use App\Base\Enums\EventNames\GeneralEventName;
use App\Base\Events\GenericEvent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestController extends Controller
{

    /** @var EventDispatcherInterface */
    private $eventDispatcher;
    /** @var EntityManagerInterface */
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
        */
        $message = $request->get('message');
        $this->eventDispatcher->dispatch(GeneralEventName::USER_MESSAGE_RECEIVED, new GenericEvent($message));

//        $test = (new MessageStack())
//            ->setContext('Route_STARTED')
//        ;
//        $this->entityManager->persist($test);
//        $this->entityManager->flush();

//        $bar1 = (new Bar1())
//            ->setBar1('lorem...')
//        ;
//        $this->entityManager->persist($bar1);

        /** @var InfoStep $entity */
//        $entity = (new InfoStep())
//            ->setOrder(7)
//            ->setDateModified()
//        ;




//        $this->entityManager->persist($entity);
//        $this->entityManager->flush();
//
//        $entity = $this->entityManager->find(InfoStep::class, 7);

        return new Response();
    }

}
