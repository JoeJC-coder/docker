<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/article', name: 'app_article')]
    public function index(ArticleRepository $ArticleRepo): Response
    {
        return $this->render('article/index.html.twig', [
            'controller_name' => 'ArticleController',
            'articles' => $ArticleRepo->findAll()
        ]);
    }

    #[Route('/article/{id}', name: 'app_article_id')]
    public function show(ArticleRepository $ArticleRepo, $id): Response
    {
        return $this->render('article/show.html.twig', [
            'controller_name' => 'ArticleController',
            'articles' => $ArticleRepo->find($id)
        ]);
    }
}
