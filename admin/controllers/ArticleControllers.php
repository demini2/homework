<?php

namespace admin\controllers;

use admin\models\Article;
use admin\models\User;
use Exception;

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
     * @throws Exception
     */
    protected function handle(): void
    {
        if (!empty($_GET)) {
            echo $this->environment->render('article.twig', [
                'arr' => Article::findById($_GET['id'])
            ]);
            if (!empty($_POST)) {
                $article = new Article();
                $article->id = $_GET['id'];
                $article->title = $_POST['newTitle'];
                $article->content = $_POST['newContent'];
                $article->save();
                $this->view->display('action.php');
            }
        }
    }

}