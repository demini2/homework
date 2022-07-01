<?php

namespace app\controllers;


use admin\models\Article;
use admin\models\User;
use Exception;

/**
 * класс-контроллер рисует новость по Id
 */
class ArticleControllers extends Controllers
{
    /**
     * рисуем одну нвость по Id
     * @return void
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     * @throws Exception
     */
    protected function handle(): void
    {
        $article = Article::findById($_GET['id']);
        if (null === $article) {
            throw new Exception( "Не найден Article с ID #{$_GET['id']}");
        }
        /** @var Article $article */
        $news = User::getFinNews($article);
        echo $this->environment->render('article.twig', [
            'content' => $news
        ]);

    }
}