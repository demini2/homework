<?php

include __DIR__ . '/autoLoad.php';

error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors', '1');

//
//$ctrl = $_GET['ctrl'] ?? 'error';
//$class = '\controller\\' . ucfirst($ctrl).'Controllers';


try {
    $view = new \app\view\View();
    $view->articles = \app\models\Article::findAll();
    $view->display('index.php');

var_dump($user= \app\models\User::authorById(7));
} catch (Exception $error) {
    echo $error->getMessage();
}