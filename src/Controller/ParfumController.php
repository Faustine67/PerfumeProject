<?php

namespace App\Controller;

use App\Entity\Marque;
use App\Entity\Parfum;
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
            // $form->handleRequest($request);
            $parfums = $repository->findSearch($data);
        // $parfums= $doctrine->getRepository(Parfum::class)->findAll();
        return $this->render('parfum/index.html.twig', [
            'parfums' => $parfums,
            'form' => $form->createView()
        ]);
        }

    //Afficher un parfum par Id
    #[Route('/parfum/{id}', name: 'detail_parfum')]
        public function detail (ManagerRegistry $doctrine, $id, Marque $marque): Response
        {
            $parfum= $doctrine->getRepository(Parfum::class)->find($id);
           
            if (!$parfum) {
                throw $this->createNotFoundException('Le parfum n\'existe pas.');
            }
            return $this->render('parfum/detail.html.twig', [
                'parfum' => $parfum,
                'marque'=>$marque,]);
        }
}

