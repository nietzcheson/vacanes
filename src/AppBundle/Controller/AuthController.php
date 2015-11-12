<?php

namespace AppBundle\Controller;

use AppBundle\Controller\TokenAuthenticatedController;
use AppBundle\Entity\User;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AuthController extends Controller //implements TokenAuthenticatedController
{

    public function userAction($id, Request $request)
    {
        $response = new Response();
        $serializer = $this->get('serializer');

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->findOneBy(array('facebookId' => $id));

        if(!$user){
            $response->setStatusCode(204, 'No user found');

            return $response->setContent($serializer->serialize($user, 'json', array('groups' => array('user'))));

        }

        return $response->setContent($serializer->serialize($user, 'json', array('groups' => array('user'))));
    }

    public function userCreateAction(Request $request)
    {
        $response = new Response();
        $serializer = $this->get('serializer');
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
            $response->setStatusCode(409, 'Errors');

            return $response->setContent($serializer->serialize($errorsString, 'json'));
        }

        $em->persist($user);
        $em->flush();

        return $response->setContent($serializer->serialize('CREATED', 'json'));
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

        return $response->setContent($serializer->serialize('UPDATED', 'json'));
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
