<?php

namespace admin\controllers;

use admin\models\Article;
use Exception;

class NewArticleControllers extends Controllers
{
    /**
     *
     * рисуем шаблон
     * отправляем новые данные в базу
     * @return void
     * @throws Exception
     */
    protected function handle(): void
    {
        echo $this->environment->render('newArticle.twig');
        if (!empty($_POST)) {
            $article = new Article();
            $article->author_id = $_POST['author'];
            $article->title = $_POST['newTitle'];
            $article->content = $_POST['newContent'];
            $article->save();
            $this->view->display('action.php');
        }
    }
}