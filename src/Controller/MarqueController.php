<?php

namespace App\Controller;

use App\Entity\Marque;
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

    //Afficher les marques d'une marque
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
