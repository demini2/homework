<?php

namespace admin\controllers;

use admin\models\Article;

class DelitControllers extends Controllers
{
    /**
     * @return void
     * @throws \Exception
     */
    protected function handle()
    {
        $article = new Article();
        $article->id = $_POST['delete'];
        $article->delete();
        $this->view->display('action.php');
    }
}