<?php

namespace AppBundle\Event;

use AppBundle\Entity\Response;
use Symfony\Component\EventDispatcher\Event;

class ResponseServiceEvent extends Event
{

    private $response;

    public function __construct(Response $response)
    {
        return $this->response = $response;
    }

    public function getResponse()
    {
        return $this->response;
    }

}



?>
