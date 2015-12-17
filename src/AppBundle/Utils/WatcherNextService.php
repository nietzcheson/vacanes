<?php

namespace AppBundle\Utils;

use RMS\PushNotificationsBundle\Message\AndroidMessage;
use RMS\PushNotificationsBundle\Message\iOSMessage;

class WatcherNextService
{

    private $em;

    public function __construct($em)
    {
        $this->em = $em;
    }

    public function execute()
    {
        $now = new \Datetime('now');

        $now->add(new \DateInterval('P1D'));

        $findWatchers = $this->em->getRepository('AppBundle:Response')->findWatchersNextService($now);

        if($findWatchers){
            foreach($findWatchers as $response){
                $userDevice = $response->getWatcherRequest()->getWatcher()->getUser()->getUserDevice();

                // $message = new iOSMessage();
                //
                // if($userDevice->getOs() != 'ios'){
                //     $message = new AndroidMessage();
                // }
                //
                // $message->setMessage('Oh my! A push notification!');
                // $message->setDeviceIdentifier($userDevice->getIdentifier());
                //
                // $this->container->get('rms_push_notifications')->send($message);

            }
        }
    }

}
