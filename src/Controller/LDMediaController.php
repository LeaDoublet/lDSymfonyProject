<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LDMediaController extends AbstractController
{
    #[Route('/l/d/media', name: 'app_l_d_media')]
    public function index(): Response
    {
        return $this->render('ld_media/index.html.twig', [
            'controller_name' => 'LDMediaController',
        ]);
    }
}
