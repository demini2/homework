<?php

namespace admin\controllers;

use admin\models\Article;
use admin\models\User;
use Exception;

/**
 *контроллер новой новости
 */
class NewArticleControllers extends Controllers
{
    /**
     * рисуем шаблон
     * отправляем новые данные в базу
     * @return void
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     * @throws \Exception
     */
    protected function handle(): void
    {
        echo $this->environment->render('newArticle.twig');
        if (!empty($_POST['newTitle']) && !empty($_POST['newContent'])) {
            $article = new Article();
            $user = new User();
            $article->author_id = $user->getAuthorIdByName($_POST['author']);
            $article->title = $_POST['newTitle'];
            $article->content = $_POST['newContent'];
            $article->save();
            header('Location: ?ctrl=index');
        }
    }
}