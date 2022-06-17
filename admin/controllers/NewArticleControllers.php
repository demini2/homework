<?php

namespace admin\controllers;

use admin\models\Article;

class NewArticleControllers extends Controllers
{
    /**
     * рисуем шаблон
     * отправляем новые данные в базу
     * @return void
     */
    protected function hendle():void
    {
        $this->view->display('newArticle.php');
        if (!empty($_POST)){
            $this->view->article->insert();
        }

    }
}