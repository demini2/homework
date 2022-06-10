<?php

include __DIR__ . '/autoLoad.php';

error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors', '1');

//
//$ctrl = $_GET['ctrl'] ?? 'error';
//$class = '\controller\\' . ucfirst($ctrl).'Controllers';


try {
    $index = new \app\models\Article();

    $data = \app\models\Article::findAll();
    include __DIR__ . '/app/templates/index.php';



} catch (Exception $error) {
    echo $error->getMessage();
}