<?php

namespace AppBundle\Controller;

use AppBundle\Controller\TokenAuthenticatedController;
use AppBundle\Entity\Owner;
use AppBundle\Form\OwnerType;
use AppBundle\Controller\APIRestBaseController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class OwnerController extends APIRestBaseController implements TokenAuthenticatedController
{

    public function ownerCreateAction(Request $request)
    {
        $em = $this->em();

        $owner = new Owner();

        $user = $request->attributes->get('user');

        $owner->setUser($user);

        $ownerForm = $this->createForm(new OwnerType(), $owner)->handleRequest($request);

        if($ownerForm->isValid()){

            $em->persist($owner);

            $em->flush();

            return $this->apiResponse($owner)->groups(array('owner'))->response();
        }

        return $this->apiResponse($this->getErrorMessages($owner))->groups(array('owner'))->response();

    }

    public function ownerUpdateAction(Request $request)
    {
        $em = $this->em();

        $user = $request->attributes->get('user');

        $owner = $user->getOwner();

        $ownerForm = $this->createForm(new OwnerType(), $owner, array('method' => 'PUT'))->handleRequest($request);

        if($ownerForm->isValid()){

            $em->persist($owner);

            $em->flush();

            return $this->apiResponse($owner)->groups(array('owner'))->response();
        }

        return $this->apiResponse($this->getErrorMessages($owner))->groups(array('owner'))->response();
    }

    public function ownerDeleteAction(Request $request)
    {
        $em = $this->em();
        $user = $request->attributes->get('user');

        $owner = $user->getOwner();

        $em->remove($owner);
        $em->flush();

        return $this->apiResponse('Owner removed')->response();

    }
}
