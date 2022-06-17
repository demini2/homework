<?php

namespace admin\controllers;

use admin\models\Article;

class IndexControllers extends Controllers
{
    /**
     * получаем все новости
     * проверяем права доступа
     * если есть рисуем шаблон
     * решаем какой метод вызывать
     *
     * @return void
     * @throws \Exception
     */
    protected function hendle():void
    {
        $this->view->article = Article::findAll();
        $this->view->display('index.php');
        $this->view->article[0]->save();
    }
}