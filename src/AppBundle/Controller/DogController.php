<?php

namespace AppBundle\Controller;

use AppBundle\Controller\APIRestBaseController;
use AppBundle\Controller\TokenAuthenticatedController;
use AppBundle\Entity\Dog;
use AppBundle\Entity\DogPhoto;
use AppBundle\Form\DogType;
use AppBundle\Form\DogPhotoType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DogController extends APIRestBaseController implements TokenAuthenticatedController
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
        $em = $this->em();

        $dogTypeRequest = $request->request->get('dog_type');

        $dog = new Dog();

        $dogForm = $this->createForm(new DogType(), $dog)->handleRequest($request);

        if($dogForm->isValid()){

            $user = $request->attributes->get('user');

            $dog->setOwner($user->getOwner());

            $em->persist($dog);
            $em->flush();

            return $this->apiResponse($dog)->groups(array('dog'))->response();
        }

        return $this->apiResponse($this->getErrorMessages($dogForm))->groups(array('dog'))->response();


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

    public function dogPhotoAction($id, Request $request)
    {
        $response = new Response();
        $serializer = $this->get('serializer');

        $em = $this->getDoctrine()->getManager();
        $dogPhoto = $em->getRepository('AppBundle:DogPhoto')->findDogPhotos($id);

        if(!$dogPhoto){
            $response->setStatusCode(204, 'No photo found');

            return $response->setContent($serializer->serialize($dogPhoto, 'json', array('groups' => array('dog'))));
        }

        return $response->setContent($serializer->serialize($dogPhoto, 'json', array('groups' => array('dogPhoto'))));
    }

    public function dogPhotoCreateAction(Request $request)
    {
        $response = new Response();
        $serializer = $this->get('serializer');

        $em = $this->getDoctrine()->getManager();

        $dog = $em->getRepository('AppBundle:Dog')->findOneBy(array('id' => $request->request->get('dog')));

        $dogPhoto = new DogPhoto();
        $dogPhoto->setFile($request->files->get('file'));
        $dogPhoto->setDog($dog);

        $validator = $this->get('validator');
        $errors = $validator->validate($dogPhoto);

        if (count($errors) > 0) {

            $errorsString = (string) $errors;
            $response->setStatusCode(409, 'Errors');

            return $response->setContent($serializer->serialize($errorsString, 'json'));
        }

        $em->persist($dogPhoto);
        $em->flush();

        return $response->setContent($serializer->serialize($dogPhoto, 'json', array('groups' => array('dogPhoto'))));
    }

    public function dogPhotoDeleteAction(Request $request)
    {
        $response = new Response();
        $serializer = $this->get('serializer');

        $em = $this->getDoctrine()->getManager();

        $dogPhoto = $em->getRepository('AppBundle:DogPhoto')->findOneBy(array('id' => $request->request->get('id')));

        if(!$dogPhoto){
            $response->setStatusCode(204, 'No dog photo found');
            return $response->setContent($serializer->serialize($dogPhoto, 'json'));
        }

        $em->remove($dogPhoto);
        $em->flush();

        return $response->setContent($serializer->serialize('DELETE', 'json'));
    }

    public function dogSizesAction()
    {
        $em = $this->em();

        $dogSizes = $em->getRepository('AppBundle:DogSize')->findAll();

        return $this->apiResponse($dogSizes)->groups(array('dogSize'))->response();
    }

    public function dogBreedsAction()
    {
        $em = $this->em();

        $dogBreed = $em->getRepository('AppBundle:DogBreed')->findAll();

        return $this->apiResponse($dogBreed)->groups(array('dogBreed'))->response();
    }
}
