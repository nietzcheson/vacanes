<?php

namespace AppBundle\Controller;

use AppBundle\Controller\TokenAuthenticatedController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AuthController extends Controller //implements TokenAuthenticatedController
{

    public function usersAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        $response = new Response();
        $serializer = $this->get('serializer');

        switch ($request->getMethod()) {
            case 'GET':

                /*
                 * Call Object
                 */

                $user = $em->getRepository('AppBundle:User')->findOneBy(array('facebookId' => $request->query->get('facebookId')));

                if(!$user){
                    $response->setStatusCode(204, 'No user found');
                }

                $response->setContent($serializer->serialize($user, 'json'));

                break;
            case 'POST':

                /*
                 * Create Object
                 */

                $user = new User();
                $user->setFacebookId($request->request->get('facebookId'));
                $user->setFirstName($request->request->get('firstName'));
                $user->setLastName($request->request->get('lastName'));
                $user->setEmail($request->request->get('email'));
                $user->setToken($request->request->get('token'));

                $validator = $this->get('validator');
                $errors = $validator->validate($user);

                if (count($errors) > 0) {

                    $errorsString = (string) $errors;

                    $response->setStatusCode(409, 'Errors');

                    $response->setContent($serializer->serialize($errorsString, 'json'));

                } else {
                    $em->persist($user);
                    $em->flush();

                    $response->setContent($serializer->serialize($user, 'json'));
                }


                break;
            case 'PUT':

                /*
                 * Update Object
                 */

                $user = $em->getRepository('AppBundle:User')->findOneBy(array('facebookId' => $request->request->get('facebookId')));

                $user->setFirstName($request->request->get('firstName'));
                $user->setLastName($request->request->get('lastName'));
                $user->setEmail($request->request->get('email'));
                $user->setToken($request->request->get('token'));

                $em->flush();

                $response->setContent($serializer->serialize('UPDATED', 'json'));
                break;
            case 'DELETE':

                /*
                 * Delete Object
                 */

                $user = $em->getRepository('AppBundle:User')->findOneBy(array('facebookId' => $request->request->get('facebookId')));

                if(!$user){
                    $response->setStatusCode(204, 'No user found');
                }

                $em->remove($user);
                $em->flush($user);

                $response->setContent($serializer->serialize('DELETE', 'json'));
                break;
            default:
                $response->setContent($serializer->serialize('Method not expected: '.$request->getMethod(), 'json'));
                break;
        }

        return $response;
    }

}
