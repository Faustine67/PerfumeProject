<?php

namespace App\Controller;

use App\Entity\Marque;
use App\Entity\Parfum;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ParfumController extends AbstractController
{
    //Creation de la barre de recherche //
    #[Route('/',name:'post.index',methods:['GET'])]
    public function search( PostRepository $postRepository, Request $request): Response{
        $searchData = new SearchData();
        $form= $this->createForm(SearchType::class,$searchData);

        $form->handelRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            dd($searchData);
        }
    }



    //Afficher tous les parfums
    #[Route('/parfum', name: 'app_parfum')]
        public function index(ManagerRegistry $doctrine): Response
        {
        $parfums= $doctrine->getRepository(Parfum::class)->findAll();
        return $this->render('parfum/index.html.twig', [
            'parfums' => $parfums,
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

