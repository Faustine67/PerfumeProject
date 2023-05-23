<?php

namespace App\Controller;

use App\Entity\NoteDeCoeur;
use App\Form\NoteDeCoeurType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
