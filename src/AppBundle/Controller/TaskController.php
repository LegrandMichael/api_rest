<?php 

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use AppBundle\Form\Type\TaskType;
use AppBundle\Entity\Task;  
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;

class TaskController extends FOSRestController implements ClassResourceInterface
{
    /**
     * @Rest\View()
     * @Rest\Get("/api/tasks") 
    */
    public function getTasksAction(Request $request) {

        $tasks = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Task')
            ->findAll();
        /* @var $tasks Task[] */

        return $tasks;
    }

    /**
     * @Rest\View()
     * @Rest\Get("/api/tasks/{id}") 
    */
    public function getTaskAction(Request $request)
    {
        $task = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Task')
            ->find($request->get('id'));
        /* @var $task Task */

        if (empty($task)) {
            return \FOS\RestBundle\View\View::create(['message' => 'Task not found'], Response::HTTP_NOT_FOUND);
        }
        
        return $task;
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/api/tasks")
    */
    public function postTasksAction(Request $request)
    {
        $task = new Task();
        $form = $this->createForm(TaskType::class, $task);

        $form->submit($request->request->all());

        if($form->isValid())
        {
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($task);
            $em->flush();
            return $task;
        } else {
            return $form;
        }
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("/api/tasks/{id}")
     */
    public function removeTaskAction(Request $request)
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $task = $em->getRepository("AppBundle:Task")
            ->find($request->get('id'));
        /* @var $Task Task */

        if($task){
            $em->remove($task);
            $em->flush();
        }
    }

    /**
     * @Rest\View()
     * @Rest\Put("/api/tasks/{id}")
     */
    public function updateTaskAction(Request $request)
    {
       return $this->updateTask($request, true);
    }

    /**
     * @Rest\View()
     * @Rest\Patch("/api/tasks/{id}")
     */
    public function patchTaskAction(Request $request)
    {
        return $this->updateTask($request, false);
    }
    
    private function updateTask(Request $request, $clearMissing)
    {
        $task = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Task')
            ->find($request->get('id'));
        /* @var $task Task */
    
        if(empty($task)){
            return \FOS\RestBundle\View\View::create(['message' => 'Task not found'], Response::HTTP_NOT_FOUND);
        }
    
        $form = $this->createForm(TaskType::class, $task);
    
        $form->submit($request->request->all(), $clearMissing);
    
        if($form->isValid()){
            $em = $this->get('doctrine.orm.entity_manager');
            $em->persist($task);
            $em->flush();
            return $task;
        } else {
            return $form;
        }
    }
}