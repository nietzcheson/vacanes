<?php

namespace AppBundle\Controller;

use AppBundle\Controller\TokenAuthenticatedController;
use AppBundle\Entity\Owner;
use AppBundle\Form\OwnerType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use AppBundle\Controller\APIRestBaseController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class OwnerController extends APIRestBaseController implements TokenAuthenticatedController
{

    /**
     * Owner create profile
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Owner create profile",
     *  filters={
     *      {"name"="owner_type[address]", "dataType"="string"},
     *  },
     * )
     */

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

        return $this->apiResponse($this->getErrorMessages($ownerForm))->groups(array('owner'))->response();

    }

    /**
     * Owner update profile
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Owner update profile",
     *  filters={
     *      {"name"="owner_type[address]", "dataType"="string"},
     *  },
     * )
     */

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

    /**
     * Owner delete profile
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Owner delete profile",
     *  filters={
     *      {"name"="owner_type[address]", "dataType"="string"},
     *  },
     * )
     */

    public function ownerDeleteAction(Request $request)
    {
        $em = $this->em();
        $user = $request->attributes->get('user');

        $owner = $user->getOwner();

        $em->remove($owner);
        $em->flush();

        return $this->apiResponse('Owner removed')->response();
    }

    /**
     * All Owner Responses
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Owner Responses",
     *  filters={
     *      {"name"="owner_type[address]", "dataType"="string"},
     *  },
     * )
     */

    public function ownerResponsesAction(Request $request)
    {
        $em = $this->em();
        $user = $request->attributes->get('user');

        $owner = $user->getOwner();

        $ownerResponses = $this->em()->getRepository('AppBundle:Response')->findOwnerResponses($owner->getId());

        return $this->apiResponse($ownerResponses)->groups(array('user','owner','request','watcherRequest','response'))->response();
    }

    /**
     * Owner Response
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Owner Response",
     *  filters={
     *      {"name"="owner_type[address]", "dataType"="string"},
     *  },
     * )
     */

    public function ownerResponseAction($id, Request $request)
    {
        $em = $this->em();
        $user = $request->attributes->get('user');

        $owner = $user->getOwner();

        $ownerResponse = $this->em()->getRepository('AppBundle:Response')->findOwnerResponse($owner->getId(), $id);

        return $this->apiResponse($ownerResponse)->groups(array('user','owner','request','watcherRequest','response'))->response();
    }

    /**
     * Owner Hire Response
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Owner Hire Response",
     *  filters={
     *      {"name"="owner_type[address]", "dataType"="string"},
     *  },
     * )
     */

    public function ownerHireResponseAction($id, Request $request)
    {
        $em = $this->em();
        $user = $request->attributes->get('user');

        $owner = $user->getOwner();

        $ownerResponse = $this->em()->getRepository('AppBundle:Response')->findOwnerResponse($owner->getId(), $id);

        $ownerResponse->setAccepted(1);

        $em->persist($ownerResponse);

        $em->flush();

        return $this->apiResponse($ownerResponse)->groups(array('user','owner','request','watcherRequest','response'))->response();
    }

    /**
     * Owner Hired Response
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Owner Hired Response",
     *  filters={
     *      {"name"="owner_type[address]", "dataType"="string"},
     *  },
     * )
     */

    public function ownerHiredResponseAction(Request $request)
    {
        $em = $this->em();
        $user = $request->attributes->get('user');

        $owner = $user->getOwner();

        $ownerResponse = $this->em()->getRepository('AppBundle:Response')->findOwnerHiredResponse($owner->getId());

        return $this->apiResponse($ownerResponse)->groups(array('user','owner','request','watcherRequest','response'))->response();
    }
}
