<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PlanningPokerController extends AbstractController
{

    #[Route('/', name: 'homepage')]
    public function getHomepageView(): Response
    {
        return $this->render('planning-poker/homepage.html.twig', [
            'title' => 'Planning Poker',
        ]);
    }

    #[Route('/games/new', name: 'new-game')]
    public function getNewGameView(): Response
    {
        return $this->render('planning-poker/new_game.html.twig', [
            'title' => 'Creating game',
        ]);
    }

    #[Route('/games/{key}', name: 'game')]
    public function getGameView(string $key): Response
    {
        return new Response('Game key: ' . $key);
    }
}