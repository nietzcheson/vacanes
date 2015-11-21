<?php

namespace AppBundle\EventListener;

use AppBundle\Controller\TokenAuthenticatedController;
use AppBundle\Model\UserManager;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class TokenListener
{
    private $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }

    public function onKernelController(FilterControllerEvent $event)
    {
        $controller = $event->getController();

        if (!is_array($controller)) {
            return;
        }

        if ($controller[0] instanceof TokenAuthenticatedController) {

            $token = $event->getRequest()->headers->get('X-AUTH-TOKEN');

            if(!$token){
                throw new AccessDeniedHttpException('This action needs a valid token!');
            }

            $user = $this->userManager->findOneBy(array('token' => $token));

            if(!$user){
                throw new AccessDeniedHttpException('User not found!');
            }
            
            $event->getRequest()->attributes->set('user', $user);
        }
    }
}

?>
