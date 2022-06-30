<?php

namespace admin\controllers;

use admin\models\Article;
use Exception;

class DeleteControllers extends Controllers
{
    /**
     * класс-контроллер
     * удаляет новость и редиректит на главную страницы
     * @return void
     */
    protected function handle():void
    {
        $article = new Article();
        $article->id = $_POST['delete'];
        $article->delete();
        header('Location: ?ctrl=index');
    }
}