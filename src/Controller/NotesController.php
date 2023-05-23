<?php

namespace App\Controller;

use App\Form\NotesType;
use App\Entity\NoteDeFond;
use App\Entity\NoteDeTete;
use App\Entity\NoteDeCoeur;
use App\Entity\Notes;
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
    public function add(EntityManagerInterface $entityManager, NoteDeFond $noteDeFond=null,NoteDeCoeur $noteDeCoeur=null, NoteDeTete $noteDeTete=null, Request $request): Response
    {
        $noteDeTete = new NoteDeTete();
        $noteDeCoeur = new NoteDeCoeur();
        $noteDeFond = new NoteDeFond();

        $form = $this->createForm(NotesType::class, [
            'noteDeCoeur' => $noteDeCoeur,
            'noteDeTete' => $noteDeTete,
            'noteDeFond' => $noteDeFond,
        ]);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Récupérer les données du formulaire
            $data = $form->getData();

            // // Assigner les valeurs aux entités
            // $noteDeTete->setValeur($data['valeur']);
            // $noteDeCoeur->setValeur($data['valeur']);
            // $noteDeFond->setValeur($data['valeur']);

            // Enregistrer les entités dans la base de données
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($noteDeTete);
            $entityManager->persist($noteDeCoeur);
            $entityManager->persist($noteDeFond);
            $entityManager->flush();

            // Rediriger ou afficher un message de succès
            return $this->redirectToRoute('app_parfum');
        }

        return $this->render('notes/add.html.twig', [
            'formAddNotes' => $form->createView(),
        ]);
    }
}
