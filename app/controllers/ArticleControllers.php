<?php

namespace app\controllers;


use admin\models\Article;

class ArticleControllers extends Controllers
{
    /**
     * рисуем одну нвость по Id
     * @return void
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    protected function hendle()
    {
        echo $this->environment->render('article.twig', [
            'arr' => Article::findById($_GET['id'])
        ]);
    }
}