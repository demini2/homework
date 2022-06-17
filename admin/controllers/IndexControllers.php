<?php

namespace admin\controllers;

use admin\models\Article;

class IndexControllers extends Controllers
{

    protected function hendle()
    {
        $this->view->article = Article::findAll();
        $this->view->display('index.php');
        $this->view->article[0]->save();
    }
}