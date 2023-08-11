<?php


namespace App\Controller;


use App\Repository\GameRepository;
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

    #[Route('/new-game', name: 'new-game')]
    public function getNewGameView(): Response
    {
        return $this->render('planning-poker/new_game.html.twig', [
            'title' => 'Creating game',
        ]);
    }

    #[Route('/games/{key}', name: 'game')]
    public function getGameView(string $key, GameRepository $gameRepository): Response
    {
        $game = $gameRepository->findOneBy(['key' => $key]);
        if (!$game) {
           $this->createNotFoundException(
               sprintf('Cannot find a game with key %s', $key)
           );
        }

        return $this->render('planning-poker/game.html.twig', [
            'title' => 'NEW COOL GAME',
            'game' => $game,
        ]);
    }
}