<?php

namespace App\Controller;

use App\Form\NotesType;
use App\Entity\NoteDeFond;
use App\Entity\NoteDeTete;
use App\Entity\NoteDeCoeur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NotesController extends AbstractController
{
    #[Route('/notes', name: 'app_notes')]
    public function index(): Response
    {
        return $this->render('notes/index.html.twig', [
            'controller_name' => 'NotesController',
        ]);
    }

    
    #[Route('/note/add', name:'add_note')]
    public function add(EntityManagerInterface $entityManager,  Request $request): Response
    {
        $form = $this->createForm(NotesType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $noteDeTete=null;
            if (isset($data['noteDeTete'])&& $data['noteDeTete']) {
                // Ajouter la note de tête à l'entité appropriée
                $noteDeTete = new NoteDeTete();
                $entityManager->persist($noteDeTete);

            }
            $noteDeCoeur= null;
            if (isset($data['noteDeCoeur'])&& $data['noteDeCoeur']) {
                $noteDeCoeur = new NoteDeCoeur();
                // Ajouter la note de cœur à l'entité appropriée
                $entityManager->persist($noteDeCoeur);

            }
            $noteDeFond= null;
            if (isset($data['noteDeFond'])&& $data['noteDeFond']) {
                // Ajouter la note de fond à l'entité appropriée
                $noteDeFond = new NoteDeFond();
                $entityManager->persist($noteDeFond);
            }
            
            $entityManager->flush();

            return $this->redirectToRoute('app_parfum');
        }

        return $this->render('notes/add.html.twig', [
            'formAddNotes' => $form->createView(),
        ]);
    }
}
