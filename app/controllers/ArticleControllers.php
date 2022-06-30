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
        $news = User::getFinNews(Article::findById($_GET['id']));
        echo $this->environment->render('article.twig', [
            'arr' => $news
        ]);

    }
}