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
        public function add(EntityManagerInterface $entityManager, Request $request): Response
    {
        $form = $this->createForm(NotesType::class);
        $form->handleRequest($request);


if ($form->isSubmitted() && $form->isValid()) {
    $data = $form->getData();
    $note = $data['note']; // Récupérer la valeur de la note

    if (isset($data['noteDeTete']) && $data['noteDeTete']) {
        $noteDeTete = new NoteDeTete();
        $noteDeTete->setNom($note);
        $entityManager->persist($noteDeTete);
    }

    if (isset($data['noteDeCoeur']) && $data['noteDeCoeur']) {
        $noteDeCoeur = new NoteDeCoeur();
        $noteDeCoeur->setNom($note);
        $entityManager->persist($noteDeCoeur);
    }

    if (isset($data['noteDeFond']) && $data['noteDeFond']) {
        $noteDeFond = new NoteDeFond();
        $noteDeFond->setNom($note);
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
