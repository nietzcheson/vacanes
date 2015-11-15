<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\DayRequest;
use AppBundle\Entity\NightRequest;
use AppBundle\Entity\PetValetRequest;

class RequestController extends Controller
{

    public function requestTypeAction()
    {
        $response = new Response();
        $serializer = $this->get('serializer');

        $em = $this->getDoctrine()->getManager();
        $requestType = $em->getRepository('AppBundle:RequestType')->findAll();

        if(!$requestType){
            $response->setStatusCode(204, 'No Request Type found');

            return $response->setContent($serializer->serialize($requestType, 'json', array('groups' => array('dog'))));
        }

        return $response->setContent($serializer->serialize($requestType, 'json'));
    }

    // public function requestAction(Request $request)
    // {
    //     $response = new Response();
    //     $serializer = $this->get('serializer');
    //
    //     $em = $this->getDoctrine()->getManager();
    //     $requestType = $em->getRepository('AppBundle:RequestType')->findOneBy(array('id' => $request->request->get('requestType')));
    //
    //     $requests = new Request();
    //
    //     $requests->setAddress($request->request->get('address'));
    //     $requests->setRequestType($requestType);
    //
    //     $em->persist($requests);
    //     $em->flush();
    //
    //     switch ($requestType->getId()) {
    //         case 1:
    //             /**
    //             * PetValet
    //             */
    //
    //             $this->petValetRequest($requests, $request);
    //
    //             break;
    //         case 2:
    //             /**
    //             * Day Request
    //             */
    //
    //             break;
    //         case 3:
    //             /**
    //             * Night Request
    //             */
    //
    //             break;
    //
    //         default:
    //             # code...
    //             break;
    //     }
    // }
    //
    // public function petValetRequest($requests, $request)
    // {
    //     $em = $this->getDoctrine()->getManager();
    //
    //     $petValetRequest = new PetValetRequest();
    //
    //     $petValetRequest->setRequest($requests);
    //     $petValetRequest->setServiceDate($request->request->get('servicioDate'));
    //     $petValetRequest->setStartTime($request->request->get('startTime'));
    //     $petValetRequest->setEndTime($request->request->get('endTime'));
    //     $petValetRequest->setComments($request->request->get('comments'));
    //
    //     $em->persist($petValetRequest);
    //     $em->flush();
    // }

    public function petValetRequestAction(Request $request)
    {
        $response = new Response();
        $serializer = $this->get('serializer');

        $em = $this->getDoctrine()->getManager();

        $userOwner = $em->getRepository('AppBundle:UserOwner')->findOneBy(array('id' => $request->request->get('owner')));

        $petValetRequest = new PetValetRequest();

        $petValetRequest->setAddress($request->request->get('address'));
        $petValetRequest->setUserOwner($userOwner);
        $petValetRequest->setServiceDate(new \Datetime($request->request->get('serviceDate')));
        $petValetRequest->setStartTime(new \Datetime($request->request->get('startTime')));
        $petValetRequest->setEndTime(new \Datetime($request->request->get('startTime')));
        $petValetRequest->setComments($request->request->get('comments'));

        $validator = $this->get('validator');
        $errors = $validator->validate($petValetRequest);

        if (count($errors) > 0) {

            $errorsString = (string) $errors;
            $response->setStatusCode(409, 'Errors');

            return $response->setContent($serializer->serialize($errorsString, 'json'));
        }

        $em->persist($petValetRequest);
        $em->flush();

        return $response->setContent($serializer->serialize($petValetRequest, 'json', array('groups' => array('petValetRequest'))));
    }

    public function dayRequestAction(Request $request)
    {

        $response = new Response();
        $serializer = $this->get('serializer');

        $em = $this->getDoctrine()->getManager();

        $userOwner = $em->getRepository('AppBundle:UserOwner')->findOneBy(array('id' => $request->request->get('owner')));

        $dayRequest = new DayRequest();

        $dayRequest->setAddress($request->request->get('address'));
        $dayRequest->setUserOwner($userOwner);
        $dayRequest->setStartDate(new \Datetime($request->request->get('startDate')));
        $dayRequest->setEndDate(new \Datetime($request->request->get('endDate')));
        $dayRequest->setStartTime(new \Datetime($request->request->get('startTime')));
        $dayRequest->setEndTime(new \Datetime($request->request->get('startTime')));
        $dayRequest->setComments($request->request->get('comments'));
        $dayRequest->setServiceDays($request->request->get('serviceDays'));
        $dayRequest->setServiceType($request->request->get('serviceType'));

        $validator = $this->get('validator');
        $errors = $validator->validate($dayRequest);

        if (count($errors) > 0) {

            $errorsString = (string) $errors;
            $response->setStatusCode(409, 'Errors');

            return $response->setContent($serializer->serialize($errorsString, 'json'));
        }

        $em->persist($dayRequest);
        $em->flush();

        return $response->setContent($serializer->serialize($dayRequest, 'json', array('groups' => array('dayRequest'))));
    }

    public function nightRequestAction(Request $request)
    {

        $response = new Response();
        $serializer = $this->get('serializer');

        $em = $this->getDoctrine()->getManager();

        $userOwner = $em->getRepository('AppBundle:UserOwner')->findOneBy(array('id' => $request->request->get('owner')));

        $nightRequest = new NightRequest();

        $nightRequest->setAddress($request->request->get('address'));
        $nightRequest->setUserOwner($userOwner);
        $nightRequest->setStartDate(new \Datetime($request->request->get('startDate')));
        $nightRequest->setEndDate(new \Datetime($request->request->get('endDate')));
        $nightRequest->setStartTime(new \Datetime($request->request->get('startTime')));
        $nightRequest->setEndTime(new \Datetime($request->request->get('startTime')));
        $nightRequest->setComments($request->request->get('comments'));
        $nightRequest->setServiceType($request->request->get('serviceType'));

        $validator = $this->get('validator');
        $errors = $validator->validate($nightRequest);

        if (count($errors) > 0) {

            $errorsString = (string) $errors;
            $response->setStatusCode(409, 'Errors');

            return $response->setContent($serializer->serialize($errorsString, 'json'));
        }

        $em->persist($nightRequest);
        $em->flush();

        return $response->setContent($serializer->serialize($nightRequest, 'json', array('groups' => array('nightRequest'))));
    }
}
