<?php

namespace App\Controller;

use App\Entity\Marque;
use App\Form\MarqueType;
use App\Repository\MarqueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class MarqueController extends AbstractController
{
    //Afficher toutes les marques
    #[Route('/marque', name: 'app_marque')]
        public function index(ManagerRegistry $doctrine): Response
        {
        $marques= $doctrine->getRepository(Marque::class)->findAll();
        return $this->render('marque/index.html.twig', [
            'marques' => $marques,
        ]);
        }
    
        #[Route('/marque/add', name: 'add_marque')]
        public function add(EntityManagerInterface $entityManager, Marque $marque=null, Request $request): Response
        {
            //Creation du formulaire
    
            $form= $this->createForm(MarqueType::class, $marque);
            $form->handleRequest($request);
    
            if($form->isSubmitted() && $form->isValid()){
    
                $marque= $form->getData();
                $entityManager->persist($marque);
                $entityManager->flush();
    
                return $this->redirectToRoute('app_parfum');
            }
    
            return $this->render('marque/add.html.twig', [
               'formAddMarque' => $form->createView(),
            ]);
        }

    //Afficher les parfums d'une marque
    #[Route('/marque/{id}', name: 'detail_marque')]
        public function detail (ManagerRegistry $doctrine, $id): Response
        {
            $marque= $doctrine->getRepository(Marque::class)->find($id);
           
            if (!$marque) {
                throw $this->createNotFoundException('La marque n\'existe pas.');
            }
            return $this->render('marque/detail.html.twig', [
                'marque' => $marque,]);
        }
}
