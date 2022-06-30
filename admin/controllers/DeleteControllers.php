<?php

namespace admin\controllers;

use admin\controllers\log\Logger;
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
        if (!empty($_POST['delete'])) {
            $article = new Article();
            $article->id = $_POST['delete'];
            $article->delete();
            header('Location: ?ctrl=index');
        } else {
            $log = new Logger();
            $log->loog(new Exception('что то пошло не так, не получилось удалить'));
            throw new Exception('что то пошло не так, не получилось удалить');
        }


    }
}