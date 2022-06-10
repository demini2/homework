<?php
include __DIR__ . '/autoLoad.php';

error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors', '1');

try {
    $index = new \app\models\Article();
    $data = \app\models\Article::findById($_GET['id']);
    $index->update2();
    include __DIR__ . '/app/templates/article.php';



} catch (Exception $error) {
    echo $error->getMessage();
}