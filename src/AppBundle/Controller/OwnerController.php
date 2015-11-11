<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Entity\UserOwner;

class OwnerController extends Controller
{


    public function userOwnerAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $response = new Response();
        $serializer = $this->get('serializer');

        switch ($request->getMethod()) {
            case 'GET':

                /*
                 * Call Object
                 */

                $request->query->set('user',4);

                $userOwner = $em->getRepository('AppBundle:UserOwner')->findOneBy(array('user' => $request->query->get('user')));

                if(!$userOwner){
                    //$response->setStatusCode(204, 'No user found');
                }

                $response->setContent($serializer->serialize($userOwner, 'json', array('groups' => array('userOwner'))));

                return $response;

                break;
            case 'POST':

                /*
                 * Create Object
                 */

                $userOwner = new UserOwner();
                $userOwner->setAddress($request->request->get('address'));
                $userOwner->setLatitude($request->request->get('latitude'));
                $userOwner->setLongitude($request->request->get('longitude'));

                $user = $em->getRepository('AppBundle:User')->findOneBy(array('id' => $request->request->get('user')));

                $userOwner->setUser($user);

                $validator = $this->get('validator');
                $errors = $validator->validate($userOwner);

                if (count($errors) > 0) {

                    $errorsString = (string) $errors;

                    $response->setStatusCode(409, 'Errors');

                    $response->setContent($serializer->serialize($errorsString, 'json'));

                } else {
                    $em->persist($userOwner);
                    $em->flush();

                    $response->setContent($serializer->serialize('CREATED', 'json'));
                }


                break;
            case 'PUT':

                /*
                 * Update Object
                 */

                $userOwner = $em->getRepository('AppBundle:UserOwner')->findOneBy(array('user' => $request->request->get('user')));

                $userOwner->setAddress($request->request->get('address'));
                $userOwner->setLatitude($request->request->get('latitude'));
                $userOwner->setLongitude($request->request->get('longitude'));

                $validator = $this->get('validator');
                $errors = $validator->validate($userOwner);

                if (count($errors) > 0) {

                    $errorsString = (string) $errors;

                    $response->setStatusCode(409, 'Errors');

                    $response->setContent($serializer->serialize('Errores', 'json'));

                } else {

                    $em->flush();

                    $response->setContent($serializer->serialize('UPDATED', 'json'));
                }


                break;
            case 'DELETE':

                /*
                 * Delete Object
                 */

                $userOwner = $em->getRepository('AppBundle:UserOwner')->findOneBy(array('user' => $request->request->get('user')));

                if(!$userOwner){
                    $response->setStatusCode(204, 'No user found');
                }

                $em->remove($userOwner);
                $em->flush();

                $response->setContent($serializer->serialize('DELETE', 'json'));
                break;
            default:
                $response->setContent($serializer->serialize('Method not expected: '.$request->getMethod(), 'json'));
                break;
        }

        return $response;
    }


}
