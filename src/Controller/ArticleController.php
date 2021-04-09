<?php

namespace App\Controller;

use App\Entity\ArticleTwig;
use App\Repository\ArticleTwigRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{

    private $articleTwigRepository;

    public function __construct(ArticleTwigRepository $articleTwigRepository)
    {
        $this->articleTwigRepository = $articleTwigRepository;
    }

    /**
     * @Route("/articles/{id}", name="show")
     * @param ArticleTwig $article
     * @return Response
     */
    public function show(ArticleTwig $article)
    {
        return $this->render('article/show.html.twig', [
            'article' => $article
        ]);
    }
}
