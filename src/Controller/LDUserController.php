<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\Type\UserType;
use Doctrine\DBAL\Types\TextType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

class LDUserController extends AbstractController
{
    #[Route('/user/register', name: 'app_register')]
    public function index(Request $request, EntityManagerInterface $em,  UserPasswordHasherInterface $hasher): Response
    {
        //creating a new user
        $user = new User();

        //creating a form
        //addig password as a password field
        $form = $this->createForm(UserType::class, $user);

        //handling the form
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // Getting the data form the form
            $user = $form->getData();
            $user->setPassword($hasher->hashPassword($user, $user->getPassword()));

            // Adding it to the db
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('ld_user/show.html.twig', [
            'form' => $form ->createView(),
        ]);
    }
}
