<?php

namespace App\Controller;

use App\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/tasks')]
class TaskController extends AbstractController
{

    #[Route('', name: 'tasks_list', methods: ['GET'])]
    public function index(EntityManagerInterface $entityManager) : Response
    {
        $repository = $entityManager->getRepository(Task::class);
        $tasks = $repository->findBy(['deleted_at' => null], ['created_at' => 'DESC']);

        return $this->render('task/task.html.twig', [
            'tasks' => $tasks,
        ]);
    }

    #[Route('', name: 'task_add', methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $entityManager): Response
    {
        $title = $request->request->get('title');

        if (!$title) {
            $this->addFlash('error', 'Title is required');
            return $this->redirectToRoute('tasks_list');
        }

        $task = new Task();
        $task->setTitle($title);

        $entityManager->persist($task);
        $entityManager->flush();

        $this->addFlash('success', 'Task added!');
        return $this->redirectToRoute('tasks_list');
    }

    #[Route('/{id}/toggle', name: 'task_toggle', methods: ['POST'])]
    public function toggle(Task $task, EntityManagerInterface $entityManager): Response
    {
        if ($task->getDeletedAt()) {
            throw $this->createNotFoundException('Task not found');
        }

        $task->setIsDone(!$task->isDone());
        $entityManager->flush();
        return $this->redirectToRoute('tasks_list');
    }

    #[Route('/{id}/delete', name: 'task_delete', methods: ['POST'])]
    public function delete(Task $task, EntityManagerInterface $entityManager): Response
    {
        $task->setDeletedAt(new \DateTime());
        $entityManager->flush();

        return $this->redirectToRoute('tasks_list');
    }
}