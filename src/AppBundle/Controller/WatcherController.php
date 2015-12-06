<?php

namespace AppBundle\Controller;

use AppBundle\Controller\APIRestBaseController;
use AppBundle\Controller\TokenAuthenticatedController;
use AppBundle\Entity\User;
use AppBundle\Entity\Watcher;
use AppBundle\Entity\Response as ResponseService;
use AppBundle\Entity\PlacePhoto;
use AppBundle\Entity\WatcherAllowedSize;
use AppBundle\Form\WatcherType;
use AppBundle\Form\ResponseType;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class WatcherController extends APIRestBaseController implements TokenAuthenticatedController
{
    public function watcherCreateAction(Request $request)
    {
        $em = $this->em();

        $watcher = new Watcher();

        $watcherForm = $this->createForm(new WatcherType(), $watcher)->handleRequest($request);

        if($watcherForm->isValid()){

            $user = $request->attributes->get('user');

            $watcher->setUser($user);

            $em->persist($watcher);

            $em->flush();

            return $this->apiResponse($watcher)->groups(array('watcher'))->response();
        }

        return $this->apiResponse($this->getErrorMessages($watcherForm))->groups(array('watcher'))->response();
    }

    public function watcherUpdateAction(Request $request)
    {
        $em = $this->em();

        $user = $request->attributes->get('user');

        $watcher = $user->getWatcher();

        $watcherForm = $this->createForm(new WatcherType(), $watcher)->handleRequest($request);

        if($watcherForm->isValid()){

            $user = $request->attributes->get('user');

            $watcher->setUser($user);

            $em->persist($watcher);

            $em->flush();

            return $this->apiResponse($watcher)->groups(array('watcher'))->response();
        }

        return $this->apiResponse($this->getErrorMessages($watcherForm))->groups(array('watcher'))->response();
    }

    public function watcherDeleteAction(Request $request)
    {
        $em = $this->em();
        $user = $request->attributes->get('user');

        $watcher = $user->getWatcher();

        $em->remove($watcher);
        $em->flush();

        return $this->apiResponse('Watcher removed')->response();

    }

    public function watcherServicesAction(Request $request)
    {
        $user = $request->attributes->get('user');

        $watcherRequests = $user->getWatcher()->getWatcherRequest();

        return $this->apiResponse($watcherRequests)->groups(array('watcherRequest','request','requestType','owner','user'))->response();
    }

    public function watcherServiceAction($id, Request $request)
    {
        $user = $request->attributes->get('user');

        $watcher = $user->getWatcher();

        $watcherService = $this->em()->getRepository('AppBundle:WatcherRequest')->findOneBy(array('id' => $id, 'watcher' => $watcher->getId()));

        return $this->apiResponse($watcherService)->groups(array('watcherRequest','request','requestType','owner','user'))->response();
    }

    public function watcherResponseAction(Request $request)
    {
        $em = $this->em();

        $response  = new ResponseService();

        $responseForm = $this->createForm(new ResponseType(), $response)->handleRequest($request);

        if($responseForm->isValid()){

            $em->persist($response);

            $em->flush();

            return $this->apiResponse($response)->groups(array('response'))->response();
        }

        return $this->apiResponse($this->getErrorMessages($responseForm))->response();

    }
}
