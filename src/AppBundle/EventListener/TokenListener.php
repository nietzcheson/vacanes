<?php

namespace AppBundle\EventListener;

use AppBundle\Controller\TokenAuthenticatedController;
use AppBundle\Model\UserManager;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class TokenListener
{
    private $tokens;
    private $user;

    public function __construct($tokens, UserManager $user)
    {
        $this->tokens = $tokens;
        $this->user = $user;
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

            $tokenAccess = $event->getRequest()->request->get('tokenAccess');
            $facebookID  = $event->getRequest()->request->get('facebookID');

            if(null === $tokenAccess){

                $user = $this->user->find(array('facebookId' => $facebookID, "token" => $tokenAccess));
                $event->getRequest()->attributes->set('user', $user);
            }

            $user = $this->user->find(array("token" => $tokenAccess));
            $event->getRequest()->attributes->set('user', $user);
        }
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
