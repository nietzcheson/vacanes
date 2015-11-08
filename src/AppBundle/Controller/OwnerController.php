<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class OwnerController extends Controller
{
    /**
     * Validación de datos y registro a la plataforma
     */

    public function ownerAction()
    {
        return new Response(json_encode(array('data' => 1)));
    }
}
