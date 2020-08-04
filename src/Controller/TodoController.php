<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Todo;

class TodoController extends AbstractController
{
    public function new($description)
    {
        $todo = new Todo();
        $todo->setDescription($description);
        $todo->setTsCreated(new \DateTime());

        $manager = $this->getDoctrine()->getManager();
        $manager->persist($todo);
        $manager->flush();
    }

    public function all()
    {
        return $this->getDoctrine()
            ->getRepository(Todo::class)
            ->findAll()
        ;
    }

    public function remove($id)
    {
        $todo = $this->getDoctrine()
            ->getRepository(Todo::class)
            ->find($id)
        ;

        if (!$todo) throw $this->createNotFoundException();

        $manager = $this->getDoctrine()->getManager();
        $manager->remove($todo);
        $manager->flush();
    }

    public function complete($id)
    {
        $todo = $this->getDoctrine()
            ->getRepository(Todo::class)
            ->find($id)
        ;

        if (!$todo) throw $this->createNotFoundException();

        $todo->setTsCompleted(new \DateTime());
        $todo->setCompleted(true);

        $manager = $this->getDoctrine()->getManager();
        $manager->flush();
    }
}