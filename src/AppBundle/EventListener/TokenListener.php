<?php

namespace AppBundle\EventListener;

use AppBundle\Controller\TokenAuthenticatedController;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class TokenListener
{
    private $tokens;

    public function __construct($tokens)
    {
        $this->tokens = $tokens;
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        $controller = $event->getController();

        if (!is_array($controller)) {
            return;
        }

        $event->getRequest()->request->set('token','pass1');

        $token = '';

        if ($controller[0] instanceof TokenAuthenticatedController) {
            $token = $event->getRequest()->request->get('token');

            if (!in_array($token, $this->tokens)) {
                throw new AccessDeniedHttpException('This action needs a valid token!');
            }
        }

        $event->getRequest()->attributes->set('auth_token', $token);
    }

    public function onKernelResponse(FilterResponseEvent $event)
    {
        if (!$token = $event->getRequest()->attributes->get('auth_token')) {
            return;
        }

        $response = $event->getResponse();

        // create a hash and set it as a response header
        $hash = sha1($response->getContent().$token);
        $response->headers->set('X-Content-Hash', $hash);

    }
}

?>
