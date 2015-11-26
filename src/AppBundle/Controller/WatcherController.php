<?php

namespace AppBundle\Controller;

use AppBundle\Controller\APIRestBaseController;
use AppBundle\Controller\TokenAuthenticatedController;
use AppBundle\Entity\User;
use AppBundle\Entity\Watcher;
use AppBundle\Entity\PlacePhoto;
use AppBundle\Entity\WatcherAllowedSize;
use AppBundle\Form\WatcherType;
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
        $response = new Response();
        $em = $this->getDoctrine()->getManager();
        $serializer = $this->get('serializer');

        $watcher = $em->getRepository('AppBundle:userWatcher')->findOneBy(array('id' => $request->request->get('id')));


        $dogSizeOriginals = $this->dogSizeOriginals($watcher);

        if(!$watcher){
            $response->setStatusCode(204, 'No user found');

            return $response->setContent($serializer->serialize($watcher, 'json', array('groups' => array('watcher'))));
        }

        $watcher->setBios($request->request->get('bios'));
        $watcher->setTelephone($request->request->get('telephone'));

        $watcherAllowedSize = $request->request->get('watcherAllowedSize');

        if($watcherAllowedSize){

            $allowedSize = [];

            foreach ($watcherAllowedSize as $key => $size) {

                $dogSize = $em->getRepository('AppBundle:DogSize')->findOneBy(array('id' => $size));

                $watcherAllowedSize = new WatcherAllowedSize();

                $watcherAllowedSize->setDogSize($dogSize);
                $watcherAllowedSize->setUserWatcher($watcher);

                $allowedSize[$key] = $watcherAllowedSize;

            }

            foreach($watcher->getWatcherAllowedSize() as $i){

                foreach($allowedSize as $allowed){

                    if($allowed->getId() != $i->getId()){
                        $em->remove($i);
                    }

                }
            }

            foreach($allowedSize as $allowed){

                $em->persist($allowed);

            }
        }

        $validator = $this->get('validator');
        $errors = $validator->validate($watcher);

        if (count($errors) > 0) {

            $errorsString = (string) $errors;

            $response->setStatusCode(409, 'Errors');

            return $response->setContent($serializer->serialize($errorsString, 'json'));
        }

        $em->flush();

        return $response->setContent($serializer->serialize($watcher, 'json', array('groups' => array('watcher'))));
    }

    public function watcherDeleteAction(Request $request)
    {
        $response = new Response();
        $serializer = $this->get('serializer');

        $em = $this->getDoctrine()->getManager();

        $watcher = $em->getRepository('AppBundle:UserWatcher')->findOneBy(array('id' => $request->request->get('id')));

        if(!$watcher){
            $response->setStatusCode(204, 'No user found');
            return $response->setContent($serializer->serialize($watcher, 'json'));
        }

        $em->remove($watcher);
        $em->flush();

        return $response->setContent($serializer->serialize('DELETE', 'json'));
    }
}
