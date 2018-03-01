<?php 

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\User;

class UserController extends Controller
{
    /**
     * @Route("/users", name="users_list")
     * @Method({"GET"})
    */
    public function getUsersAction(Request $request)
    {
        $users = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:User')
            ->findAll();
        /* @var $users User[] */

        $formated = [];
        foreach ($users as $user) {
            $formated[] = [
                'first name' => $user->getFirstName(),
                'last name' => $user->getLastName(),
                'function' => $user->getFunction(),
                'phone number' => $user->getPhoneNumber(),
                'cellphone' => $user->getCellphone(),
                'email address' => $user->getEmailAddress(),
                'organization' => $user->getOrganization()
            ];
        }
        return new JsonResponse($formated);
    }

    /**
     * @Route("/users/{user_id}", name="users_one") 
     * @Method({"GET"})
    */
    public function getUserAction(Request $request)
    {
        $user = $this->get("doctrine.orm.entity_manager")
            ->getRepository("AppBundle:User")
            ->find($request->get("user_id"));
        /* @var $user User */

        if (empty($place)) {
            return new JsonResponse(['message' => 'user not found'], Response::HTTP_NOT_FOUND);
        }

        $formated = [
            'first name' => $user->getFirstName(),
            'last name' => $user->getLastName(),
            'function' => $user->getFunction(),
            'phone number' => $user->getPhoneNumber(),
            'cellphone' => $user->getCellphone(),
            'email address' => $user->getEmailAddress(),
            'organization' => $user->getOrganization()
        ];
        return new JsonResponse($formated);
    }
}