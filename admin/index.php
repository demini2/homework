<?php

use admin\controllers\log\Logger;

include __DIR__ . '/../autoLoad.php';

error_reporting(E_ALL & ~E_DEPRECATED);
ini_set('display_errors', '1');


$ctrl = $_GET['ctrl'] ?? 'error';
$class = 'admin\controllers\\' . ucfirst($ctrl) . 'Controllers';

try {
    $index = new $class;
    echo $index->action();
} catch (Exception $error) {
    (new Logger())->log($error);
    echo $error->getMessage();
}