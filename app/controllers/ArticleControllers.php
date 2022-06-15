<?php

namespace app\controllers;

use app\models\Article;

class ArticleControllers extends Controllers
{
    protected function access(): bool
    {
        return parent::access();
    }

    protected function hendle()
    {

            $this->view->article = Article::findById($_GET['id']);
            $this->view->display('article.php');

    }

    public function __invoke()
    {
        parent::__invoke();
    }
}