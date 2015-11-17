<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Entity\UserWatcher;
use AppBundle\Entity\PlacePhoto;
use AppBundle\Entity\WatcherAllowedSize;
use Doctrine\Common\Collections\ArrayCollection;

class WatcherController extends Controller
{
    public function watcherAction($id, Request $request)
    {
        $response = new Response();
        $serializer = $this->get('serializer');

        $em = $this->getDoctrine()->getManager();
        $userOwner = $em->getRepository('AppBundle:UserWatcher')->findOneBy(array('user' => $id));

        if(!$userOwner){
            $response->setStatusCode(204, 'No user found');

            return $response->setContent($serializer->serialize($userOwner, 'json', array('groups' => array('watcher'))));
        }

        return $response->setContent($serializer->serialize($userOwner, 'json', array('groups' => array('watcher','placePhoto'))));
    }

    public function watcherCreateAction(Request $request)
    {
        $response = new Response();
        $serializer = $this->get('serializer');
        $em = $this->getDoctrine()->getManager();

        $watcher = new UserWatcher();

        $watcher->setBios($request->request->get('bios'));
        $watcher->setTelephone($request->request->get('telephone'));

        $user = $em->getRepository('AppBundle:User')->findOneBy(array('id' => $request->request->get('user')));

        if(!$user){
            $response->setStatusCode(204, 'No user found');

            return $response->setContent($serializer->serialize($user, 'json'));
        }

        $watcher->setUser($user);

        if($request->request->get('watcherAllowedSize')){

            foreach ($request->request->get('watcherAllowedSize') as $size) {

                $dogSize = $em->getRepository('AppBundle:DogSize')->findOneBy(array('id' => $size));

                $watcherAllowedSize = new WatcherAllowedSize();

                $watcherAllowedSize->setDogSize($dogSize);
                $watcherAllowedSize->setUserWatcher($watcher);

                $em->persist($watcherAllowedSize);
            }
        }

        if($request->files->get('placePhoto')){
            foreach($request->files->get('placePhoto') as $photo){

                $placePhotos = new PlacePhoto();

                $placePhotos->setUserWatcher($watcher);
                $placePhotos->setFile($photo);

                $em->persist($placePhotos);
            }
        }

        $validator = $this->get('validator');
        $errors = $validator->validate($watcher);

        if (count($errors) > 0) {

            $errorsString = (string) $errors;
            $response->setStatusCode(409, 'Errors');

            return $response->setContent($serializer->serialize($errorsString, 'json'));
        }

        $em->persist($watcher);
        $em->flush();

        return $response->setContent($serializer->serialize($watcher, 'json', array('groups' => array('watcher','placePhoto'))));
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
