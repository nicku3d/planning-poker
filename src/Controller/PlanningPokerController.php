<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlanningPokerController extends AbstractController
{

    #[Route('/', name: 'homepage')]
    public function homepage(): Response
    {
        return $this->render('planning-poker/homepage.html.twig', [
            'title' => 'Planning Poker',
        ]);
    }

    public function createGame(): Response
    {
        return new Response('Creating game');
    }

    #[Route('/game/{key}', name: 'game')]
    public function game(string $key): Response
    {
        return new Response('Game key: ' . $key);
    }
}