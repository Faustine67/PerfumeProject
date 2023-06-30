<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    #[Route('/user/{id}', name: 'profil_user', methods:['GET', 'POST'])]
    public function profil(EntityManagerInterface $entityManager, ManagerRegistry $doctrine, $id, User $user, Request $request): Response
    {
        $user = $entityManager->getRepository(User::class)->find($id);

        if (!$user) {
            throw $this->createNotFoundException('L\'Utilisateur n\' existe pas.');
        }

        $prenom = $user->getPrenom();
        $nom = $user->getNom();
        $email = $user->getEmail();

        return $this->render('user/profil.html.twig', [
            'user' => $user,
            'prenom' => $prenom,
            'nom' => $nom,
            'email' => $email,
        ]);
    }
}


