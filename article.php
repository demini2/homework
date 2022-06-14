<?php
include __DIR__ . '/autoLoad.php';

error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors', '1');

try {
    $view = new \app\view\View();

    $view->article = \app\models\Article::findById($_GET['id']);
    $view->display('article.php');


} catch (Exception $error) {
    echo $error->getMessage();
}