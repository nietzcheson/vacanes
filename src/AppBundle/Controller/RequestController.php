<?php

namespace AppBundle\Controller;

use AppBundle\AppEvents;
use AppBundle\Controller\APIRestBaseController;
use AppBundle\Controller\TokenAuthenticatedController;
use AppBundle\Entity\DayRequest;
use AppBundle\Entity\NightRequest;
use AppBundle\Entity\PetValetRequest;
use AppBundle\Event\RequestServiceEvent as RequestEvent;
use AppBundle\Entity\Request as RequestService;
use AppBundle\Form\DayRequestType;
use AppBundle\Form\NightRequestType;
use AppBundle\Form\RequestType;
use AppBundle\Form\PetValetRequestType;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class RequestController extends APIRestBaseController implements TokenAuthenticatedController
{

    /**
     * Request Types
     * Return array to request types
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Request Types",
     * )
     */

    public function requestTypeAction()
    {
        $em = $this->em();

        $requestType = $em->getRepository('AppBundle:RequestType')->findAll();

        return $this->apiResponse($requestType)->groups(array('requestType'))->response();
    }

    /**
     * Dog create
     *
     * @ApiDoc(
     *  resource=true,
     *  description="Dog create",
     *  filters={
     *      {"name"="request_type[address]", "dataType"="string"},
     *      {"name"="request_type[requestType]", "dataType"="integer"},
     *      {"name"="pet_valet_request_type[serviceDate]", "dataType"="datetime"},
     *      {"name"="pet_valet_request_type[startTime]", "dataType"="time"},
     *      {"name"="pet_valet_request_type[endTime]", "dataType"="time"},
     *      {"name"="pet_valet_request_type[comments]", "dataType"="text"},
     *      {"name"="pet_valet_request_type[latitude]", "dataType"="float"},
     *      {"name"="pet_valet_request_type[longitude]", "dataType"="float"},
     *      {"name"="day_request_type[startDate]", "dataType"="datetime"},
     *      {"name"="day_request_type[endDate]", "dataType"="datetime"},
     *      {"name"="day_request_type[startTime]", "dataType"="time"},
     *      {"name"="day_request_type[endTime]", "dataType"="time"},
     *      {"name"="day_request_type[serviceType]", "dataType"="integer"},
     *      {"name"="day_request_type[serviceDays]", "dataType"="integer"},
     *      {"name"="day_request_type[comments]", "dataType"="text"},
     *      {"name"="night_request_type[startDate]", "dataType"="datetime"},
     *      {"name"="night_request_type[endDate]", "dataType"="datetime"},
     *      {"name"="night_request_type[startTime]", "dataType"="time"},
     *      {"name"="night_request_type[endTime]", "dataType"="time"},
     *      {"name"="night_request_type[comments]", "dataType"="text"},
     *      {"name"="night_request_type[serviceType]", "dataType"="integer"},
     *  },
     * )
     */

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

            $requestType = $this->requestType($requestService, $request);

            if($requestType != 1){
                return $this->apiResponse($requestType)->statusCode(500)->statusText('Errores')->response();
            }

            $em->persist($requestService);

            $em->flush();

            /**
            * Event for find all watchers
            */

            $this->get('event_dispatcher')->dispatch(
                AppEvents::REQUEST_SERVICE,
                new RequestEvent($requestService)
            );

            return $this->apiResponse($requestService)->groups(array('request'))->response();
        }

        return $this->apiResponse($this->getErrorMessages($requestServiceForm))->groups(array('request','petValetRequest'))->response();

    }

    private function requestType($model, Request $request)
    {
        $returnRequest = '';

        switch ($model->getRequestType()->getType()) {
            case 'pet_valet':
                $returnRequest = $this->petValetRequest($model, $request);
                break;
            case 'day_request':
                $returnRequest = $this->dayRequest($model, $request);
                break;
            case 'night_request':
                $returnRequest = $this->nightRequest($model, $request);
                break;
        }

        return $returnRequest;
    }

    private function petValetRequest($model, Request $request)
    {
        $em = $this->em();

        $petValetRequest = new PetValetRequest();
        $petValetRequestForm = $this->createForm(new PetValetRequestType(), $petValetRequest)->handleRequest($request);

        if($petValetRequestForm->isValid()){
            $petValetRequest->setRequest($model);
            $em->persist($petValetRequest);

            return true;
        }

        return $this->getErrorMessages($petValetRequestForm);
    }

    private function dayRequest($model, Request $request)
    {
        $em = $this->em();

        $dayRequest = new dayRequest();
        $dayRequestForm = $this->createForm(new dayRequestType(), $dayRequest)->handleRequest($request);

        if($dayRequestForm->isValid()){

            $dayRequest->setRequest($model);
            $em->persist($dayRequest);

            return true;
        }

        return $this->getErrorMessages($dayRequestForm);
    }

    private function nightRequest($model, Request $request)
    {
        $em = $this->em();

        $nightRequest = new NightRequest();
        $nightRequestForm = $this->createForm(new NightRequestType(), $nightRequest)->handleRequest($request);

        if($nightRequestForm->isValid()){

            $nightRequest->setRequest($model);
            $em->persist($nightRequest);

            return true;
        }

        return $this->getErrorMessages($nightRequestForm);
    }

}
