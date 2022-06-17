<?php

namespace admin\controllers;

use admin\models\Article;

class NewArticleControllers extends Controllers
{

    protected function hendle()
    {
        $this->view->display('newArticle.php');
        if (!empty($_POST)){
            $this->view->article->insert();
        }

    }
}