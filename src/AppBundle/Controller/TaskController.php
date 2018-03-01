<?php 

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Task;

class TaskController extends Controller
{
    /**
     * @Route("/tasks", name="tasks_list")
     * @Method({"GET"})
     */
    public function getTasksAction(Request $request) {

        $tasks = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Task')
            ->findAll();
        /* @var $tasks Task[] */


        
        $formated = [];
        foreach ($tasks as $task) {
            $formated[] = [
                'id' => $task->getId(),
                'date of receipt' => $task->getDateReceipt(), 
                'user concerned' => 'user concerned',
                'theme' => $task->getTheme(),
                'priority' => $task->getPriorityLevel(),
                'deadline' => $task->getDeadline(),
                'public concerned' => $task->getPublicConcerned(),
                'goal' => $task->getGoal(),
                'broadcasting' => $task->getBroadcasting(),
                'answer' => $task->getAnswer(),
                'treated by' => 'treated by',
                'state' =>$task->getState()
            ];
        }
        return new JsonResponse($formated);
    }

    /**
     * @Route("/tasks/{task_id}", name="tasks_one")
     * @Method({"GET"})
    */
    public function getTaskAction(Request $request)
    {
        $task = $this->get('doctrine.orm.entity_manager')
            ->getRepository('AppBundle:Task')
            ->find($request->get('task_id'));
        /* @var $task Task */

        if (empty($task)) {
            return new JsonResponse(['message' => 'user not found'], Response::HTTP_NOT_FOUND);
        }
        
        $formated = [
            'id' => $task->getId(),
            'date of receipt' => $task->getDateReceipt(), 
            'user concerned' => 'user concerned',
            'theme' => $task->getTheme(),
            'priority' => $task->getPriorityLevel(),
            'deadline' => $task->getDeadline(),
            'public concerned' => $task->getPublicConcerned(),
            'goal' => $task->getGoal(),
            'broadcasting' => $task->getBroadcasting(),
            'answer' => $task->getAnswer(),
            'treated by' => 'treated by',
            'state' =>$task->getState()
        ];
        return new JsonResponse($formated);
    }
}