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
use Doctrine\Common\Collections\ArrayCollection;

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
        $em = $this->em();

        $user = $request->attributes->get('user');

        $dogPhotoOriginals =

        $dog = $em->getRepository('AppBundle:Dog')->findOneBy(array('owner' => $user->getOwner(), 'id' => $request->request->get('dog_id')));

        $dogForm = $this->createForm(new DogType(), $dog)->handleRequest($request);

        if($dogForm->isValid()){

            $em->persist($dog);
            $em->flush();

            return $this->apiResponse($dog)->groups(array('dog'))->response();
        }

        return $this->apiResponse($this->getErrorMessages($dogForm))->groups(array('dog'))->response();
    }

    public function dogDeleteAction(Request $request)
    {
        $em = $this->em();

        $user = $request->attributes->get('user');

        $dog = $em->getRepository('AppBundle:Dog')->findOneBy(array('owner' => $user->getOwner()->getId(), 'id' => $request->request->get('dog_id')));

        if(!$dog){
            return $this->apiResponse($dog)->statusCode(204)->statusText('Not dog found')->response();
        }

        $em->remove($dog);
        $em->flush();

        return $this->apiResponse(array('Dog remove'))->response();
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
