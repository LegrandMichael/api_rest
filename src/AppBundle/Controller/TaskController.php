<?php 

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use AppBundle\Entity\Task;

class TaskController extends Controller
{
    /**
     * @Rest\View()
     * @Rest\Get("/tasks") 
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
     * @Rest\Get("/tasks/{id}") 
    */
    public function getTaskAction(Request $request)
    {
        $task = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Task')
            ->find($request->get('id'));
        /* @var $task Task */

        if (empty($task)) {
            return new JsonResponse(['message' => 'user not found'], Response::HTTP_NOT_FOUND);
        }
        
        return $task;
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_CREATED)
     * @Rest\Post("/tasks")
    */
    public function postTasksAction(Request $request)
    {
        /*return [
            'payload' => [
                $request->get('dateReceipt'),
                $request->get('theme'),
                $request->get('priorityLevel'),
                $request->get('deadline'),
                $request->get('publicConcerned'),
                $request->get('goal'),
                $request->get('broadcasting'),
                $request->get('answer'),
                $request->get('state')
            ]

        ];*/
        $task = new Task();

        $task->setDateReceipt($request->get('dateReceipt'))
            //->setUserConcerned($request->get('userConcerned'))
            ->setTheme($request->get('theme'))
            ->setPriorityLevel($request->get('priorityLevel'))
            ->setDeadline($request->get('deadline'))
            ->setPublicConcerned($request->get('publicConcerned'))
            ->setGoal($request->get('goal'))
            ->setBroadcasting($request->get('broadcasting'))
            ->setAnswer($request->get('answer'))
            //->setTreatedBy($request->get('treatedBy'))
            ->setState($request->get('state'))
        ;

        $em = $this->get('doctrine.orm.entity_manager');
        $em->persist($task);
        $em->flush();

        return $task;
    }
}