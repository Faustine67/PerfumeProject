<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\Parfum;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class UserController extends AbstractController
{
    #[Route('/user/{id}', name: 'profil_user', methods:['GET', 'POST'])]
    public function profil(EntityManagerInterface $entityManager, ManagerRegistry $doctrine, $id, User $user, Request $request): Response
    {
        $user = $entityManager->getRepository(User::class)->find($id);

        if (!$user) {
            throw $this->createNotFoundException('L\'Utilisateur n\' existe pas.');
        }

          // Supposez que vous avez une méthode dans votre UserRepository pour récupérer les parfums disponibles
          $parfumfavori = $entityManager->getRepository(Parfum::class)->findAll();

        $prenom = $user->getPrenom();
        $nom = $user->getNom();
        $email = $user->getEmail();

        return $this->render('user/profil.html.twig', [
            'user' => $user,
            'prenom' => $prenom,
            'nom' => $nom,
            'email' => $email,
            'parfumfavori' => $parfumfavori, // Transmettez la liste des parfums à la vue

        ]);
    }

    
     // Ajouter un parfum favori
     
    #[Route('/parfum/{parfumId}/{userId}', name: 'add_favori', methods: ['GET', 'POST'])]
     public function addFavori(EntityManagerInterface $entityManager, User $user, Parfum $parfum, Request $request ): Response
     {
        $parfum = $entityManager->getRepository(Parfum::class)->find($parfumId);
        $parfumsfavoris = $entityManager->getRepository(Parfum::class)->find($parfumId);
        $user = $entityManager->getRepository(User::class)->find($userId);
        
        if (!$parfum || !$user) {
            throw $this->createNotFoundException('Parfum or User not found.');
        }

         $user->addFavori($parfum);
     
         $entityManager->persist($parfumsfavoris);
         $entityManager->flush();
     
         return $this->redirectToRoute('detail_parfum', ['id' => $parfum->getId()]);
     }
     
}


