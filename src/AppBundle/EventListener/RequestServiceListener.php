<?php

namespace AppBundle\EventListener;

use AppBundle\Event\RequestServiceEvent as RequestEvent;
use AppBundle\Entity\WatcherRequest;
use Doctrine\ORM\EntityManager;
use RMS\PushNotificationsBundle\Message\AndroidMessage;
use RMS\PushNotificationsBundle\Message\iOSMessage;

class RequestServiceListener
{
    private $em;
    private $container;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    public function setContainer($container)
    {
        $this->container = $container;
    }

    public function getContainer()
    {
        return $this->container;
    }

    public function onRequestService(RequestEvent $event)
    {
        $request = $event->getRequest();

        $user = $request->getOwner()->getUser();

        $perimeter = pow(30 / 111.12, 2);

        $watchers = $this->em->getRepository('AppBundle\Entity\Watcher')->findWatchers($user, $perimeter);

        foreach ($watchers as $watcher) {
            $watcherRequest = new WatcherRequest();

            $watcherRequest->setRequest($request);
            $watcherRequest->setWatcher($watcher);

            $this->em->persist($watcherRequest);

            // $userDevice = $user->getUserDevice();
            //
            // $message = new iOSMessage();
            //
            // if($userDevice->getOs() != 'ios'){
            //     $message = new AndroidMessage();
            // }
            //
            // $message->setMessage('Oh my! A push notification!');
            // $message->setDeviceIdentifier($userDevice->getIdentifier());
            //
            // $this->getContainer()->get('rms_push_notifications')->send($message);
        }

        $this->em->flush();
    }

}


?>
