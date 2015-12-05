<?php

namespace AppBundle\EventListener;

use AppBundle\Controller\TokenAuthenticatedController;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class TokenListener
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
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

            $user = $this->em->getRepository('AppBundle:User')->findOneBy(array('token' => $token));

            if(!$user){
                throw new AccessDeniedHttpException('User not found!');
            }

            $event->getRequest()->attributes->set('user', $user);
        }
    }
}

?>
