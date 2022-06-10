<?php
include __DIR__ . '/autoLoad.php';

error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors', '1');

try {
    $index = new \models\Article();
    if (!empty($_GET['id'])) {
        $data = $index->findById($_GET['id']);
        include __DIR__ . '/templates/article.php';
    } else {
        include __DIR__ . '/templates/newArticle.php';
    }

    $index->save();


} catch (Exception $error) {
    echo $error->getMessage();
}