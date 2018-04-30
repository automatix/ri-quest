<?php
namespace App\Process;

use Psr\Container\ContainerInterface;

class SystemEventHandlerFactory
{

    public function create(ContainerInterface $container)
    {
        // The array index determines the priority and so the handling order!
        return new SystemEventHandler(
            $container->get('process_handler.step'),
            $container->get('process_handler.poi'),
            $container->get('process_handler.quest'),
            $container->get('process_handler.access'),
            $container->get('process_handler.completion')
        );
    }

}