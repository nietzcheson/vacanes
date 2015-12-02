<?php

namespace AppBundle\EventListener;

use AppBundle\Event\RequestServiceEvent as RequestEvent;
use Doctrine\ORM\EntityManager;

class RequestServiceListener
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function onRequestService(RequestEvent $event)
    {

        $request = $event->getRequest();

    }

}


?>
