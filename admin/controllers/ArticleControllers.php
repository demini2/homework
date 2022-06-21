<?php

namespace admin\controllers;

use admin\models\Article;

class ArticleControllers extends Controllers
{
    /**
     * принимаем Id новости
     * которую будем выводить,
     * проверяем права доступа
     * если есть рисуем шаблон
     * решаем какой метод вызывать
     *
     * @return void
     * @throws \Exception
     */
    protected function hendle(): void
    {
        echo $this->environment->render('article.twig', [
            'arr' => Article::findById($_GET['id'])
        ]);
        if (!empty($_POST)){
            $this->view->article->seve();
        }

    }

}