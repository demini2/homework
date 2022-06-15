<?php

namespace app\controllers;



class IndexControllers extends Controllers
{
    protected function hendle()
    {
        $this->view->articles = \app\models\Article::findAll();
        $this->view->display('index.php');

    }
}