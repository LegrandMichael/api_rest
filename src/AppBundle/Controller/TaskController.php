<?php 

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Task;

class TaskController extends Controller
{
    /**
     * @Route("/tasks", name="tasks_list")
     * @Method({"GET"})
     */
    public function getTasksAction(Request $request) {
        return new JsonResponse([
            new Task('Dossiers GJ', "Faire le tri pour les primes", "Oui"), 
            new Task("Bilan Compta", "Bilan compta annuel voir avec Angélique et Clothilde", "Oui"),
            new Task("Accueil Jeunes", "Remplir la fiche d'info", "Non")
        ]);

    }
}