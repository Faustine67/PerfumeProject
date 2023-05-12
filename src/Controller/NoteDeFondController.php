<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class NoteDeFondController extends AbstractController
{
    #[Route('/note/de/fond', name: 'app_note_de_fond')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/NoteDeFondController.php',
        ]);
    }
}
