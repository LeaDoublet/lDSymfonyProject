<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LDPageController extends AbstractController
{
    #[Route('/page/{slug}', name: 'age_show')]
    public function show(): Response
    {
        return $this->render('ld_page/show.html.twig', [
            'controller_name' => 'LDPageController',
        ]);
    }
}
