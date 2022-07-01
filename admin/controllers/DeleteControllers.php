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
     * @throws \Exception
     */
    protected function handle(): void
    {
        if (empty($_POST['delete'])) {
            throw new Exception('Некорректный запрос. Ожидается параметр delete');
        }

        $article = new Article();
        $article->id = $_POST['delete'];
        $article->delete();
        header('Location: ?ctrl=index');
    }
}