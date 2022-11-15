<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Repository\ArticlesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LDArticleController extends AbstractController
{
    #[Route('/article/{article}', name: 'article_show')]
    public function show(string $article, ArticlesRepository $repo): Response
    {
        return $this->render('article/show.html.twig', [
            'article' => $repo->findOneBy([
                'title' => $article
            ]),
        ]);
    }
}
