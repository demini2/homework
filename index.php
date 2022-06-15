<?php

include __DIR__ . '/autoLoad.php';

error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors', '1');

//
//$ctrl = $_GET['ctrl'] ?? 'error';
//$class = '\controller\\' . ucfirst($ctrl).'Controllers';

$ctrl = $_GET['ctrl'] ?? 'error';
$class = '\app\controllers\\' . ucfirst($ctrl).'Controllers';
echo $class;

try {
    $index = new $class;
    echo $index();

} catch (Exception $error) {
    echo $error->getMessage();
}