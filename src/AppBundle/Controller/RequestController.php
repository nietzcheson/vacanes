<?php

namespace AppBundle\Controller;

use AppBundle\Controller\APIRestBaseController;
use AppBundle\Controller\TokenAuthenticatedController;
use AppBundle\Entity\DayRequest;
use AppBundle\Entity\NightRequest;
use AppBundle\Entity\PetValetRequest;
use AppBundle\Entity\Request as RequestService;
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

            $em->persist($requestService);

            $em->flush();

            $requestType = $request->request->get('request_type')['requestType'];

            $requestType = $em->getRepository('AppBundle:RequestType')->findOneBy(array('id' => $requestType));

            switch ($requestType->getType()) {
                case 'pet_valet':

                    $petValetRequest = new PetValetRequest();
                    $petValetRequestForm = $this->createForm(new PetValetRequestType(), $petValetRequest)->handleRequest($request);

                    if($petValetRequestForm->isValid()){

                        $petValetRequestType = $request->request->get('pet_valet_request_type');

                        $petValetRequest->setServiceDate(new \Datetime($petValetRequestType['serviceDate']));
                        $petValetRequest->setStartTime(new \Datetime($petValetRequestType['startTime']));
                        $petValetRequest->setEndTime(new \Datetime($petValetRequestType['endTime']));

                        $petValetRequest->setRequest($requestService);
                        $em->persist($petValetRequest);

                    }

                    return $this->apiResponse($this->getErrorMessages($petValetRequestForm))->groups(array('petValetRequest'))->response();

                    break;

                default:
                    # code...
                    break;
            }


            return $this->apiResponse($requestService)->groups(array('request'))->response();
        }

        return $this->apiResponse($this->getErrorMessages($requestServiceForm))->groups(array('request','petValetRequest'))->response();

    }
}
