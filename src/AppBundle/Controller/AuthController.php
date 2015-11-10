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

                return $response->setContent($serializer->serialize($user, 'json'));
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
                    /*
                     * Utiliza el método __toString de la variable $errors, que
                     * es un objeto de tipo ConstraintViolationList. Así se obtiene
                     * una cadena de texto lista para poder depurar los errores.
                     */
                    $errorsString = (string) $errors;

                    $response->setStatusCode(409, 'Errors');

                    return new Response($this->get('serializer')->serialize($errorsString, 'json'));

                }

                $em->persist($user);
                $em->flush();

                return new Response($this->get('serializer')->serialize($user, 'json'));
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

                return new Response($this->get('serializer')->serialize(array('PUT: '. $request->getMethod()), 'json'));
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

                return new Response($this->get('serializer')->serialize('DELETE', 'json'));
                break;
            default:
                return new Response($this->get('serializer')->serialize(array('Method not expected: '. $request->getMethod()), 'json'));
                break;
        }
    }

}
