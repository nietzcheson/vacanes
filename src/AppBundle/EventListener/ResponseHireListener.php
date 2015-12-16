<?php

namespace AppBundle\EventListener;

use AppBundle\Event\ResponseServiceEvent as ResponseEvent;
use RMS\PushNotificationsBundle\Message\AndroidMessage;
use RMS\PushNotificationsBundle\Message\iOSMessage;

class ResponseHireListener
{
    public function onResponseHire(ResponseEvent $event)
    {
        $response = $event->getResponse();

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


?>
