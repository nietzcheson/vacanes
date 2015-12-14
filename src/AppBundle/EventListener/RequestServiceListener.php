<?php

namespace AppBundle\EventListener;

use AppBundle\Event\RequestServiceEvent as RequestEvent;
use AppBundle\Entity\WatcherRequest;
use Doctrine\ORM\EntityManager;
use RMS\PushNotificationsBundle\Message\iOSMessage;

class RequestServiceListener
{
    private $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
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

            $message = new iOSMessage();
            $message->setMessage('Oh my! A push notification!');
            $message->setDeviceIdentifier($watcher->getUser()->getIOSDevice()->getIdentifier());

            $this->container->get('rms_push_notifications')->send($message);
        }

        $this->em->flush();

        return $watchers;
    }

}


?>
