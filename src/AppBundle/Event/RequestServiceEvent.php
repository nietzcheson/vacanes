<?php

namespace AppBundle\Event;

use AppBundle\Entity\Request;
use Symfony\Component\EventDispatcher\Event;

class RequestServiceEvent extends Event
{

    private $request;

    public function __construct(Request $request)
    {
        return $this->request = $request;
    }

    public function getRequest()
    {
        return $this->request;
    }

}



?>
