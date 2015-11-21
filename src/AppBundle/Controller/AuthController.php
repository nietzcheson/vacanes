<?php

namespace AppBundle\Controller;

use AppBundle\Controller\APIRestBaseController;
use AppBundle\Controller\TokenAuthenticatedController;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AuthController extends APIRestBaseController
{
    public function loginAction(Request $request)
    {
        $em = $this->em();

        $user = new User();

        $userForm = $this->createForm(new UserType(), $user)->handleRequest($request);

        if($userForm->isValid()){

            $token = base_convert(sha1('-token-'.uniqid()), 16, 36);
            $user->setToken($token);

            $em->persist($user);
            $em->flush();

            return $this->apiResponse($user)->groups(array('user'))->response();
        }

        return $this->apiResponse($this->getErrorMessages($userForm))->groups(array('user'))->response();

    }


}
