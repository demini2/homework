<?php

namespace app\controllers;


use admin\models\Article;
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
    protected function handle():void
    {
        echo $this->environment->render('article.twig', [
            'arr' => Article::findById($_GET['id'])
        ]);
    }
}