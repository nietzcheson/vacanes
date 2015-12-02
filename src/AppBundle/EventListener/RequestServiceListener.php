<?php

namespace AppBundle\EventListener;

use AppBundle\Event\RequestEvent;

class RequestServiceListener
{

    public function onRequestService(RequestEvent $event)
    {

        $request = $event->getRequest();

    }

}


?>
