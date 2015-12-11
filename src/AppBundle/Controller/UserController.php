<?php

namespace AppBundle\Controller;

use AppBundle\Controller\APIRestBaseController;
use AppBundle\Controller\TokenAuthenticatedController;
use AppBundle\Form\UserType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserController extends APIRestBaseController implements TokenAuthenticatedController
{

    /**
     * User Update
     *
     * @ApiDoc(
     *  resource=true,
     *  description="User Updated",
     *  filters={
     *      {"name"="user_type[firstName]", "dataType"="string"},
     *      {"name"="user_type[lastName]", "dataType"="string"},
     *      {"name"="user_type[email]", "dataType"="string"},
     *      {"name"="user_type[latitude]", "dataType"="float"},
     *      {"name"="user_type[longitude]", "dataType"="float"}
     *  },
     * )
     */

    public function userUpdateAction(Request $request)
    {
        $em = $this->em();

        $user = $request->attributes->get('user');

        $userForm = $this->createForm(new UserType(), $user, array('method' => 'PUT'))->handleRequest($request);

        if($userForm->isValid()){

            $em->persist($user);
            $em->flush();

            return $this->apiResponse($user)->groups(array('user'))->response();
        }

        return $this->apiResponse($this->getErrorMessages($userForm))->groups(array('user'))->response();

    }

    /**
     * User Delete <br />
     * No parameters are passed. The system internally captures the user object and deletes
     *
     * @ApiDoc(
     *  resource=true,
     *  description="User Delete",
     * )
     */

    public function userDeleteAction(Request $request)
    {
        $em = $this->em();

        $user = $request->attributes->get('user');

        $em->remove($user);
        $em->flush();

        return $this->apiResponse(array('User removed'))->response();

    }

}
