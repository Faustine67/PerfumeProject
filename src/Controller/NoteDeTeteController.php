<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class NoteDeTeteController extends AbstractController
{
    #[Route('/note/de/tete', name: 'app_note_de_tete')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/NoteDeTeteController.php',
        ]);
    }
}
