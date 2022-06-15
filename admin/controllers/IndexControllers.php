<?php

namespace controllers;

class IndexControllers extends Controllers
{

    protected function hendle()
    {
        $this->view->article = \models\Article::findAll();
        $this->view->display('index.php');
        $this->view->article[0]->save();
    }
}