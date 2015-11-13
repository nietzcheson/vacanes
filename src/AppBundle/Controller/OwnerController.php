<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Entity\UserOwner;

class OwnerController extends Controller
{
    public function userOwnerAction($id, Request $request)
    {
        $response = new Response();
        $serializer = $this->get('serializer');

        $em = $this->getDoctrine()->getManager();
        $userOwner = $em->getRepository('AppBundle:userOwner')->findOneBy(array('user' => $id));

        if(!$userOwner){
            $response->setStatusCode(204, 'No user found');

            return $response->setContent($serializer->serialize($userOwner, 'json', array('groups' => array('userOwner'))));
        }

        return $response->setContent($serializer->serialize($userOwner, 'json', array('groups' => array('userOwner'))));
    }

    public function userOwnerCreateAction(Request $request)
    {
        $response = new Response();
        $serializer = $this->get('serializer');
        $em = $this->getDoctrine()->getManager();

        $userOwner = new UserOwner();

        $userOwner->setAddress($request->request->get('address'));
        $userOwner->setLatitude($request->request->get('latitude'));
        $userOwner->setLongitude($request->request->get('longitude'));

        $user = $em->getRepository('AppBundle:User')->findOneBy(array('id' => $request->request->get('user')));

        if(!$user){
            $response->setStatusCode(204, 'No user found');

            return $response->setContent($serializer->serialize($user, 'json'));
        }

        $userOwner->setUser($user);

        $validator = $this->get('validator');
        $errors = $validator->validate($userOwner);

        if (count($errors) > 0) {

            $errorsString = (string) $errors;
            $response->setStatusCode(409, 'Errors');

            return $response->setContent($serializer->serialize($errorsString, 'json'));
        }

        $em->persist($userOwner);
        $em->flush();

        return $response->setContent($serializer->serialize($userOwner, 'json', array('groups' => array('userOwner'))));
    }

    public function userOwnerUpdateAction(Request $request)
    {
        $response = new Response();
        $em = $this->getDoctrine()->getManager();
        $serializer = $this->get('serializer');

        $userOwner = $em->getRepository('AppBundle:userOwner')->findOneBy(array('id' => $request->request->get('id')));

        if(!$userOwner){
            $response->setStatusCode(204, 'No user found');

            return $response->setContent($serializer->serialize($userOwner, 'json', array('groups' => array('userOwner'))));
        }

        $userOwner->setAddress($request->request->get('address'));
        $userOwner->setLatitude($request->request->get('latitude'));
        $userOwner->setLongitude($request->request->get('longitude'));

        $validator = $this->get('validator');
        $errors = $validator->validate($userOwner);

        if (count($errors) > 0) {

            $errorsString = (string) $errors;

            $response->setStatusCode(409, 'Errors');

            return $response->setContent($serializer->serialize($errorsString, 'json'));
        }

        $em->flush();

        return $response->setContent($serializer->serialize($userOwner, 'json', array('groups' => array('userOwner'))));
    }

    public function userOwnerDeleteAction(Request $request)
    {
        $response = new Response();
        $serializer = $this->get('serializer');

        $em = $this->getDoctrine()->getManager();

        $userOwner = $em->getRepository('AppBundle:userOwner')->findOneBy(array('id' => $request->request->get('id')));

        if(!$userOwner){
            $response->setStatusCode(204, 'No user found');
            return $response->setContent($serializer->serialize($userOwner, 'json'));
        }

        $em->remove($userOwner);
        $em->flush();

        return $response->setContent($serializer->serialize('DELETE', 'json'));
    }
}
