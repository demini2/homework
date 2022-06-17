<?php

namespace admin\controllers;

use admin\models\Article;

class ArticleControllers extends Controllers
{
    /**
     * принимаем Id новости
     * коиорую будем выводить,
     * проверяем права доступа
     * если есть рисуем шаблон
     * решаем какой метод вызывать
     *
     * @return void
     * @throws \Exception
     */
    protected function hendle():void
    {
            $this->view->article = Article::findById($_GET['id']);
            $this->view->display('article.php');
            $this->view->article[0]->save();

    }

}