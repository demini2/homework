<?php

namespace admin\controllers;

use admin\models\Article;

class ArticleControllers extends Controllers
{

    protected function hendle()
    {
            $this->view->article = Article::findById($_GET['id']);
            $this->view->display('article.php');
            $this->view->article[0]->save();

    }

}