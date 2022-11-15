<?php

namespace App\Controller;

use App\Entity\Video;
use App\Repository\VideoRepository;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LDVideoController extends AbstractController
{
    #[Route('/video', name: 'video_show')]
    public function index(VideoRepository $repo): Response
    {
        return $this->render('ld_video/index.html.twig', [
            'videos' => $repo->findAll(),
        ]);
    }
}
