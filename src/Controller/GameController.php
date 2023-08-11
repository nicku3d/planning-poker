<?php


namespace App\Controller;


use App\Entity\Game;
use App\Service\KeyGeneratorService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    #[Route('/api/games', name: 'api-game-create',methods: ['POST'])]
    public function create(Request $request, EntityManagerInterface $entityManager, KeyGeneratorService $keyGenerator): Response
    {
        if (!$request->request->has('name')) {
            $this->createNotFoundException('no name');
        }
        $name = $request->request->get('name');
        $game = new Game();
        $game->setKey($keyGenerator->generateKey());
        $game->setName($name);
        $entityManager->persist($game);
        $entityManager->flush();
        $response = [
            'key' => $game->getKey(),
        ];
        return $this->json($response, 201);
    }
}