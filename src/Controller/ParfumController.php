<?php

namespace App\Controller;

use App\Entity\Marque;
use App\Entity\Parfum;
use App\Form\ParfumType;
use App\Form\SearchForm;
use App\Model\SearchData;
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
            'form' => $form->createView()
        ]);
        }
    
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

    //Afficher un parfum par Id
    #[Route('/parfum/{id}', name: 'detail_parfum')]
        public function detail (ManagerRegistry $doctrine, $id, Parfum $parfums): Response
        {
            $parfum= $doctrine->getRepository(Parfum::class)->find($id);
           
            if (!$parfum) {
                throw $this->createNotFoundException('Le parfum n\'existe pas.');
            }

            $marque = $parfum->getMarque();
            $dupes= $parfum->getDupe();
            return $this->render('parfum/detail.html.twig', [
                'parfum' => $parfum,
                'marque'=>$marque,
                'dupes'=>$dupes,
            ]);
        }
}

