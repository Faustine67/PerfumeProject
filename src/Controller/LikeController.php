<?php

namespace App\Controller;


use App\Entity\Parfum;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class LikeController extends AbstractController
{
    #[Route('/like/parfum/{id}', name: 'like_parfum')]
    public function like(Parfum $parfum, EntityManagerInterface $manager ):Response
    {
        $user =$this->getUser();

        if ($parfum->isLikedByUser($user)){
            $parfum->removeLike($user);
            $manager->flush();

            return $this->json(['message'=>' like deleted']);
        }

        $parfum->addLike($user);
        $manager->flush();

        return $this->json(['message'=>' like added']);
    }
}