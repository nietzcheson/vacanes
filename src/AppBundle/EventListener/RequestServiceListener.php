<?php

namespace AppBundle\EventListener;

use AppBundle\Event\RequestServiceEvent as RequestEvent;
use AppBundle\Entity\UserWatcherRequest;
use Doctrine\ORM\EntityManager;

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
            $watcherRequest = new UserWatcherRequest();

            $watcherRequest->setRequest($request);
            $watcherRequest->setWatcher($watcher);

            $this->em->persist($watcherRequest);
        }

        $this->em->flush();

        return $watchers;
    }

}


?>
