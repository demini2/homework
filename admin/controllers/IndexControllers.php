<?php

namespace admin\controllers;

use admin\models\Article;

class IndexControllers extends Controllers
{
    /**
     * получаем все новости
     * проверяем права доступа
     * если есть рисуем шаблон
     * решаем какой метод вызывать
     *
     * @return void
     * @throws \Exception
     */
    protected function hendle(): void
    {

        echo $this->environment->render('index.twig', [
            'arr' => Article::findAll()
        ]);
        if (!empty($_POST)){
            $this->view->article->seve();
        }
    }
}