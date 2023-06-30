<?php

namespace App\Controller;

use App\Entity\Marque;
use App\Entity\Parfum;
use App\Form\DupeType;
use DateTimeImmutable;
use App\Form\ParfumType;
use App\Form\SearchForm;
use App\Model\SearchData;
use App\Entity\Commentaire;
use App\Form\CommentaireType;
use App\Repository\ParfumRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ParfumController extends AbstractController
{

    //Afficher tous les parfums + barre de recherche
    #[Route('/parfum', name: 'app_parfum')]
        public function index( ParfumRepository $repository, Request $request)
        {
            $data = new SearchData();
            $form= $this->createForm(SearchForm::class,$data);
            $form->handleRequest($request);
            $parfums = $repository->findAll();
        // $parfums= $doctrine->getRepository(Parfum::class)->findAll();
        return $this->render('parfum/index.html.twig', [
            'parfums' => $parfums,
            'form' => $form->createView(),
            'data' => $data,
        ]);
        }
    
    //Ajouter un parfum 
    #[Route('/parfum/add', name: 'add_parfum')]
    public function add(EntityManagerInterface $entityManager, Parfum $parfum=null, Request $request): Response
    {
        //Creation du formulaire

        $form= $this->createForm(ParfumType::class, $parfum);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $parfum= $form->getData();
            $entityManager->persist($parfum);
            $entityManager->flush();

            return $this->redirectToRoute('app_parfum',array('id' => $parfum->getId()));
        }

        return $this->render('parfum/add.html.twig', [
           'formAddParfum' => $form->createView(),
        ]);
    }

    //Ajouter un dupe à un parfum
    #[Route('parfum/{id}/add', name: 'add_dupe')]
    public function addDupe(EntityManagerInterface $entityManager, Parfum $parfum, Request $request):Response
    {
        $dupe = new Parfum(); // Créer une nouvelle instance de Parfum

        $form= $this->createForm(DupeType::class, $dupe);
        $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()){

                $dupe = $form->getData();
                $parfum->addDupe($dupe);
                $entityManager->persist($dupe);
                $entityManager->flush();


                return $this->redirectToRoute('detail_parfum', ['id' => $parfum->getId()]);
            }
        
        return $this->render('parfum/dupeAdd.html.twig',[
            'formAddDupe'=>$form->createView(),
        ]);
    }

    
    //Afficher un parfum par Id
    #[Route('/parfum/{id}', name: 'detail_parfum', methods:['GET', 'POST'])]
        public function detail (EntityManagerInterface $entityManager,ManagerRegistry $doctrine, $id, Parfum $parfums, Request $request): Response
        {
            $parfum= $doctrine->getRepository(Parfum::class)->find($id);
           
            if (!$parfum) {
                throw $this->createNotFoundException('Le parfum n\'existe pas.');
            }

            {
                // Créer une instance de Commentaire
                $commentaire = new Commentaire();
                $commentaire->setIsApprouved(false);
                $commentaire->setParfum($parfum);
                if($this->getUser()) {
                    $commentaire->setUser($this->getUser());
                }
            }
            
            // Créer le formulaire pour ajouter un commentaire
            $form= $this->createForm (CommentaireType::class, $commentaire);
            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {
                //Recuperer la date actuelle
                $dateActuelle = new DateTimeImmutable();
                $commentaire->setDateCommentaire($dateActuelle);

                //Enregistrer le commentaire dans la base de données
                $entityManager->persist($commentaire);
                $entityManager->flush();
                $this->addFlash('success', 'Votre commentaire a bien été enregistré. Il sera soumis à modération dans les plus brefs délais.');
            }

            $marque = $parfum->getMarque();
            $dupes= $parfum->getDupe();
            return $this->render('parfum/detail.html.twig', [
                'parfum' => $parfums,
                'marque'=>$marque,
                'dupes'=>$dupes,
                'form'=>$form->createView(),
            ]);
        }
}

