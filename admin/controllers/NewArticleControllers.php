<?php

namespace admin\controllers;

use admin\models\Article;

class NewArticleControllers extends Controllers
{
    /**
     *
     * рисуем шаблон
     * отправляем новые данные в базу
     * @return void
     * @throws \Exception
     */
    protected function hendle():void
    {
        echo $this->environment->render('newArticle.twig');
        if (!empty($_POST)){
            $this->view->article->insert();
        }

    }
}