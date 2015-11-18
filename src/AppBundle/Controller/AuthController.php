<?php

namespace AppBundle\Controller;

use AppBundle\Controller\APIRestBaseController;
use AppBundle\Controller\TokenAuthenticatedController;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AuthController extends APIRestBaseController //implements TokenAuthenticatedController
{

    public function userAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->findOneBy(array('facebookId' => $id));

        if(!$user){
            return $this->apiResponse($user)->statusCode(204)->statusText('No user found')->response();
        }

        return $this->apiResponse($user)->groups(array('user'))->response();
    }

    public function userCreateAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();

        $user = new User();

        $user->setFacebookId($request->request->get('facebookId'));
        $user->setFirstName($request->request->get('firstName'));
        $user->setLastName($request->request->get('lastName'));
        $user->setEmail($request->request->get('email'));
        $user->setToken($request->request->get('token'));

        $validator = $this->get('validator');
        $errors = $validator->validate($user);

        if (count($errors) > 0) {

            $errorsString = (string) $errors;

            return $this->apiResponse($errorsString)->statusCode(409)->statusText('Validations Errors')->response();
        }

        $em->persist($user);
        $em->flush();

        return $this->apiResponse($user)->groups(array('user'))->response();
    }

    public function userUpdateAction(Request $request)
    {
        $response = new Response();
        $em = $this->getDoctrine()->getManager();
        $serializer = $this->get('serializer');

        $user = $em->getRepository('AppBundle:User')->findOneBy(array('id' => $request->request->get('id')));

        if(!$user){
            $response->setStatusCode(204, 'No user found');

            return $response->setContent($serializer->serialize($user, 'json'));
        }

        $user->setFirstName($request->request->get('firstName'));
        $user->setLastName($request->request->get('lastName'));
        $user->setEmail($request->request->get('email'));
        $user->setToken($request->request->get('token'));

        $validator = $this->get('validator');
        $errors = $validator->validate($user);

        if (count($errors) > 0) {

            $errorsString = (string) $errors;

            $response->setStatusCode(409, 'Errors');

            return $response->setContent($serializer->serialize($errorsString, 'json'));
        }

        $em->flush();

        return $response->setContent($serializer->serialize($user, 'json', array('groups' => array('user'))));
    }

    public function userDeleteAction(Request $request)
    {
        $response = new Response();
        $serializer = $this->get('serializer');

        $em = $this->getDoctrine()->getManager();

        $user = $em->getRepository('AppBundle:User')->findOneBy(array('id' => $request->request->get('id')));

        if(!$user){
            $response->setStatusCode(204, 'No user found');
            return $response->setContent($serializer->serialize($user, 'json'));
        }

        $em->remove($user);
        $em->flush();

        return $response->setContent($serializer->serialize('DELETE', 'json'));
    }

}
