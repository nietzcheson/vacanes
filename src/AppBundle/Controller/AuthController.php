<?php

namespace AppBundle\Controller;

use AppBundle\Controller\TokenAuthenticatedController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class AuthController extends Controller implements TokenAuthenticatedController
{
    /**
     * Validación de datos y registro a la plataforma
     */

    public function registerAction(Request $request)
    {
        return new Response(json_encode(array('datos' => 'Registrando desde Facebook'. $request->request->get('facebookId'))));
    }

    public function loginAction()
    {
        return new Response('Login');
    }
}
