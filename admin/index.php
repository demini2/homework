<?php

include __DIR__ . '/autoLoad.php';

error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors', '1');

//
//$ctrl = $_GET['ctrl'] ?? 'error';
//$class = '\controller\\' . ucfirst($ctrl).'Controllers';


try {
//    $index = new \models\Article();
//
//    $index->findAll();
//    $data = \models\Article::findAll();
//    include __DIR__ . '/templates/index.php';
//    $index->save();
    $view = new \view\View();
    $view->article = \models\Article::findAll();
    $view->display('index.php');
    $view->article[0]->save();
    echo '<br>';


} catch (Exception $error) {
    echo $error->getMessage();
}