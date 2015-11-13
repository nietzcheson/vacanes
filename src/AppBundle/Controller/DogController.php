<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Dog;
use AppBundle\Entity\UserOwner;

class DogController extends Controller
{
    public function dogAction($id, Request $request)
    {
        $response = new Response();
        $serializer = $this->get('serializer');

        $em = $this->getDoctrine()->getManager();
        $dog = $em->getRepository('AppBundle:Dog')->findOneBy(array('owner' => $id));

        if(!$dog){
            $response->setStatusCode(204, 'No userOwner found');

            return $response->setContent($serializer->serialize($dog, 'json', array('groups' => array('dog'))));
        }

        return $response->setContent($serializer->serialize($dog, 'json', array('groups' => array('dog'))));
    }

    public function dogCreateAction(Request $request)
    {
        $response = new Response();
        $serializer = $this->get('serializer');
        $em = $this->getDoctrine()->getManager();

        $dog = new Dog();

        $size = $em->getRepository('AppBundle:DogSize')->findOneBy(array('id' => $request->request->get('size')));
        $breed = $em->getRepository('AppBundle:DogBreed')->findOneBy(array('id' => $request->request->get('breed')));
        $userOwner = $em->getRepository('AppBundle:UserOwner')->findOneBy(array('user' => $request->request->get('owner')));

        $dog->setName($request->request->get('name'));
        $dog->setDogSize($size);
        $dog->setDogBreed($breed);
        $dog->setOwner($userOwner);

        $validator = $this->get('validator');
        $errors = $validator->validate($dog);

        if (count($errors) > 0) {

            $errorsString = (string) $errors;
            $response->setStatusCode(409, 'Errors');

            return $response->setContent($serializer->serialize($errorsString, 'json'));
        }

        $em->persist($dog);
        $em->flush();

        return $response->setContent($serializer->serialize($dog, 'json', array('groups' => array('dog'))));
    }

    public function dogUpdateAction(Request $request)
    {
        $response = new Response();
        $serializer = $this->get('serializer');
        $em = $this->getDoctrine()->getManager();

        $dog = $em->getRepository('AppBundle:Dog')->findOneBy(array('id' => $request->request->get('id')));

        $size = $em->getRepository('AppBundle:DogSize')->findOneBy(array('id' => $request->request->get('size')));
        $breed = $em->getRepository('AppBundle:DogBreed')->findOneBy(array('id' => $request->request->get('breed')));
        $userOwner = $em->getRepository('AppBundle:UserOwner')->findOneBy(array('user' => $request->request->get('owner')));

        $dog->setName($request->request->get('name'));
        $dog->setDogSize($size);
        $dog->setDogBreed($breed);
        $dog->setOwner($userOwner);

        $validator = $this->get('validator');
        $errors = $validator->validate($dog);

        if (count($errors) > 0) {

            $errorsString = (string) $errors;
            $response->setStatusCode(409, 'Errors');

            return $response->setContent($serializer->serialize($errorsString, 'json'));
        }

        $em->flush();

        return $response->setContent($serializer->serialize($dog, 'json', array('groups' => array('dog'))));
    }

    public function dogDeleteAction(Request $request)
    {
        $response = new Response();
        $serializer = $this->get('serializer');

        $em = $this->getDoctrine()->getManager();

        $dog = $em->getRepository('AppBundle:Dog')->findOneBy(array('id' => $request->request->get('id')));

        if(!$dog){
            $response->setStatusCode(204, 'No dog found');
            return $response->setContent($serializer->serialize($dog, 'json'));
        }

        $em->remove($dog);
        $em->flush();

        return $response->setContent($serializer->serialize('DELETE', 'json'));
    }
}
