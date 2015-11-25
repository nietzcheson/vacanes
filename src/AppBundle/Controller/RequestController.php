<?php

namespace AppBundle\Controller;

use AppBundle\Controller\APIRestBaseController;
use AppBundle\Controller\TokenAuthenticatedController;
use AppBundle\Entity\DayRequest;
use AppBundle\Entity\NightRequest;
use AppBundle\Entity\PetValetRequest;
use AppBundle\Entity\Request as RequestService;
use AppBundle\Form\DayRequestType;
use AppBundle\Form\NightRequestType;
use AppBundle\Form\RequestType;
use AppBundle\Form\PetValetRequestType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class RequestController extends APIRestBaseController implements TokenAuthenticatedController
{

    public function requestTypeAction()
    {
        $em = $this->em();

        $requestType = $em->getRepository('AppBundle:RequestType')->findAll();

        return $this->apiResponse($requestType)->groups(array('requestType'))->response();
    }

    public function requestAction(Request $request)
    {
        $em = $this->em();

        $requestService = new RequestService();

        $requestServiceForm = $this->createForm(new RequestType(),$requestService)->handleRequest($request);

        if($requestServiceForm->isValid()){

            $user = $request->attributes->get('user');

            $requestService->setOwner($user->getOwner());

            /**
            * Method to persist the services
            * [PetValet, DayRequest, NightRequest]
            */

            $this->requestType($requestService, $request);

            $em->persist($requestService);

            $em->flush();

            return $this->apiResponse($requestService)->groups(array('request'))->response();
        }

        return $this->apiResponse($this->getErrorMessages($requestServiceForm))->groups(array('request','petValetRequest'))->response();

    }

    private function requestType($model, Request $request)
    {
        switch ($model->getRequestType()->getType()) {
            case 'pet_valet':
                $this->petValetRequest($model, $request);
                break;
            case 'day_request':
                $this->dayRequest($model, $request);
                break;
            case 'night_request':
                $this->nightRequest($model, $request);
                break;
            default:
                die('No Request Found');
                break;
        }
    }

    private function petValetRequest($model, Request $request)
    {
        $em = $this->em();

        $petValetRequest = new PetValetRequest();
        $petValetRequestForm = $this->createForm(new PetValetRequestType(), $petValetRequest)->handleRequest($request);

        if($petValetRequestForm->isValid()){

            $petValetRequest->setRequest($model);
            $em->persist($petValetRequest);
        }

        return $this->apiResponse($this->getErrorMessages($petValetRequestForm))->response();
    }

    private function dayRequest($model, Request $request)
    {
        $em = $this->em();

        $dayRequest = new dayRequest();
        $dayRequestForm = $this->createForm(new dayRequestType(), $dayRequest)->handleRequest($request);

        if($dayRequestForm->isValid()){

            $dayRequest->setRequest($model);
            $em->persist($dayRequest);
        }

        return $this->apiResponse($this->getErrorMessages($dayRequestForm))->response();
    }

    private function nightRequest($model, Request $request)
    {
        $em = $this->em();

        $nightRequest = new NightRequest();
        $nightRequestForm = $this->createForm(new NightRequestType(), $nightRequest)->handleRequest($request);

        if($nightRequestForm->isValid()){

            $nightRequest->setRequest($model);
            $em->persist($nightRequest);

        }

        return $this->apiResponse($this->getErrorMessages($nightRequestForm))->response();
    }

}
