<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/tasks')]
class TaskController extends AbstractController
{

    #[Route('', name: 'tasks_list', methods: ['GET'])]
    public function index() : Response
    {
        return new Response('tasks will go here');
    }
}