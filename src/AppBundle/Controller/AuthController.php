<?php

namespace AppBundle\Controller;

use AppBundle\Controller\APIRestBaseController;
use AppBundle\Controller\TokenAuthenticatedController;
use AppBundle\Entity\User;
use AppBundle\Form\UserType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AuthController extends APIRestBaseController
{

    /**
     * Returns the user data once registered
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Login User",
     *  filters={
     *      {"name"="user_type[facebookId]", "dataType"="string"},
     *      {"name"="user_type[firstName]", "dataType"="string"},
     *      {"name"="user_type[lastName]", "dataType"="string"},
     *      {"name"="user_type[email]", "dataType"="string"},
     *      {"name"="user_type[latitude]", "dataType"="float"},
     *      {"name"="user_type[longitude]", "dataType"="float"}
     *  },
     * )
     */

    public function loginAction(Request $request)
    {
        $em = $this->em();

        $user = new User();

        $userForm = $this->createForm(new UserType(), $user)->handleRequest($request);

        if($userForm->isValid()){

            //echo "<pre>";print_r($request);exit();

            $token = base_convert(sha1('-token-'.uniqid()), 16, 36);
            $user->setToken($token);

            $em->persist($user);
            $em->flush();

            return $this->apiResponse($user)->groups(array('user','iosDevice'))->response();
        }

        //return $this->render('Auth/register.html.twig', array('form' => $userForm->createView()));

        return $this->apiResponse($this->getErrorMessages($userForm))->groups(array('user'))->response();

    }


}
