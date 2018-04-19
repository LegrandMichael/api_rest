<?php

namespace AppBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Response;


class DefaultController extends FOSRestController implements ClassResourceInterface
{
    /**
     * @Rest\View(statusCode=Response::HTTP_FORBIDDEN)
     */
    public function indexAction()
    {
        
    }
}
