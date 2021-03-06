<?php 

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;
use AppBundle\Form\Type\UserType;
use AppBundle\Entity\User;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;

class UserController extends FOSRestController implements ClassResourceInterface
{
    /**
     * @Rest\View()
     * @Rest\Get("/api/users")
    */
    public function getUsersAction(Request $request)
    {
        $users = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:User')
            ->findAll();
        /* @var $users User[] */

        return $users;
    }

    /**
     * @Rest\View()
     * @Rest\Get("/users/{id}") 
    */
    public function getUserAction(Request $request)
    {
        $user = $this->get("doctrine.orm.entity_manager")
            ->getRepository("AppBundle:User")
            ->find($request->get('id'));
        /* @var $user User */

        if (empty($user)) {
            return \FOS\RestBundle\View\View::create(['message' => 'user not found'], Response::HTTP_NOT_FOUND);
        }
        return $user;
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/users")
     */
    public function postUsersAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->submit($request->request->all());

        if($form->isValid()){
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($user);
            $em->flush();
            return $user;  
        } else {
            return $form;
        }
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("/users/{id}")
     */
    public function removeUserAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $user = $em->getRepository("AppBundle:User")
            ->find($request->get('id'));
        /* @var $user User */

        if($user){
            $em->remove($user);
            $em->flush();
        }
    }

    /**
     * @Rest\View()
     * @Rest\Put("/users/{id}")
     */
    public function updateUserAction(Request $request)
    {
       return $this->updateUser($request, true);
    }

    /**
     * @Rest\View()
     * @Rest\Patch("/users/{id}")
     */
    public function patchUserAction(Request $request)
    {
        return $this->updateUser($request, false);
    }
    
    private function updateUser(Request $request, $clearMissing)
    {
        $user = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:User')
            ->find($request->get('id'));
        /* @var $user User */
    
        if(empty($user)){
            return \FOS\RestBundle\View\View::create(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
        }
    
        $form = $this->createForm(UserType::class, $user);
    
        $form->submit($request->request->all(), $clearMissing);
    
        if($form->isValid()){
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($user);
            $em->flush();
            return $user;
        } else {
            return $form;
        }
    }
}