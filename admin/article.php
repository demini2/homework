<?php
include __DIR__ . '/../autoLoad.php';

error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors', '1');

try {
    $view = new admin\view\View();

    if (!empty($_GET['id'])) {
        $view->article = admin\models\Article::findById($_GET['id']);
        $view->display('article.php');
        $view->article[0]->save();
    } else {
        $view->display('newArticle.php');
        $view->article->save();
    }


} catch (Exception $error) {
    echo $error->getMessage();
}