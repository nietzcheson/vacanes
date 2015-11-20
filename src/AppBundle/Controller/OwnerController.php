<?php

namespace AppBundle\Controller;

use AppBundle\Controller\TokenAuthenticatedController;
use AppBundle\Entity\UserOwner;
use AppBundle\Form\UserOwnerType;
use AppBundle\Controller\APIRestBaseController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class OwnerController extends APIRestBaseController implements TokenAuthenticatedController
{

    public function userOwnerCreateAction(Request $request)
    {

        $em = $this->em();

        $userOwner = new UserOwner();

        $user = $request->attributes->get('user');

        $userOwner->setUser($user);

        $userOwnerForm = $this->createForm(new UserOwnerType(), $userOwner)->handleRequest($request);

        if($userOwnerForm->isValid()){

            $em->persist($userOwner);

            $em->flush();

            return $this->apiResponse($userOwner)->groups(array('userOwner'))->response();
        }

        return $this->apiResponse($userOwner)->groups(array('userOwner'))->response();

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
