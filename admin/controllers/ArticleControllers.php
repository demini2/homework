<?php

namespace admin\controllers;

use admin\models\Article;
use admin\models\User;
use Exception;

/**
 * класс-контроллер решует шаблон
 * заполняет его информацией
 * и обрабатывает запрос пользователя
 */
class ArticleControllers extends Controllers
{
    /**
     * принимаем Id новости
     * которую будем выводить,
     * проверяем права доступа
     * если есть рисуем шаблон
     * решаем какой метод вызывать
     * @return void
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     * @throws \Exception
     */
    protected function handle(): void
    {
        if (empty($_GET['id'])) {
            return;
        }

        /** @var Article $article */
        $article = Article::findById($_GET['id']);
        if (null === $article) {
            throw new Exception("Не найден Article с ID #{$_GET['id']}");
        }

        $news = User::getFinNews($article);

        echo $this->environment->render('article.twig', [
            'content' => $news
        ]);

        if (!empty($_POST['newTitle']) && !empty($_POST['newContent'])) {
            $article = new Article();
            $article->id = $_GET['id'];
            $article->title = $_POST['newTitle'];
            $article->content = $_POST['newContent'];
            $article->save();
            header('Location: ?ctrl=article&id=' . $article->getId());
        }
    }

}