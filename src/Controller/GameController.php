<?php


namespace App\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameController extends AbstractController
{
    #[Route('/api/games', name: 'api-game-create',methods: ['POST'])]
    public function create(): Response
    {
        //TODO make real response
        $response = [
            'key' => 'temporary_key',
        ];
        return $this->json($response, 201);
    }
}