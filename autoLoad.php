<?php

include __DIR__.'/../vendor/autoload.php';

spl_autoload_register(function ($className) {
    $Base = __DIR__ . '/';

    $way = str_replace('\\', '/', $className);
    $file = $Base . $way . '.php';

    if (file_exists($file)) {
        require $file;
    } else {
        new \admin\controllers\log\Logger(new Exception );
        throw new Exception(' в доступе отказано');
    }
}
);
