<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class NoteDeCoeurController extends AbstractController
{
    #[Route('/note/de/coeur', name: 'app_note_de_coeur')]
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/NoteDeCoeurController.php',
        ]);
    }
}
