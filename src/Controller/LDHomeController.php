<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Repository\ArticlesRepository;
use App\Repository\CategoryRepository;
use App\Repository\VideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LDHomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ArticlesRepository $articlesRepo, CategoryRepository $categoryRepo, VideoRepository $videoRepo): Response
    {
        return $this->render('ld_home/index.html.twig', [
            'articles'=> $articlesRepo->findAll(),
            'videos' => $videoRepo->findAll(),
            'categories' => $categoryRepo->findAll()
        ]);
    }
}
