<?php

namespace app\controllers;


use admin\models\Article;

/**
 * класс-контроллер
 * рисует шаблон и выводит все новости
 */
class IndexControllers extends Controllers
{
    /**
     * рисуем все новости
     * @return void
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    protected function handle():void
    {
        echo $this->environment->render('index.twig', [
            'arr' => Article::findAll()
        ]);
    }

}