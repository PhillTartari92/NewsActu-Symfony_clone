<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfileController extends AbstractController
{

    /**
     * @Route("/profile", name="show_profile", methods={"GET"})
     */
    public function showProfile(): Response
    {
       return $this->render('profile/show_profile.html.twig');
    } 

    /**
     * @Route("/profile/tous-mes-commentaires", name="show_user_commentaires", methods={"GET"})
     */
    public function showUserCommentaries(EntityManagerInterface $entityManager): Response
    {
       $commentaries = $entityManager->getRepository(Commentary::class)->findBy(['author' => $this->getUser()]);

       return $this->render('profile/show_user_commentaries.html.twig', [
           'commentaries' => $commentaries
       ]);
    }

}
