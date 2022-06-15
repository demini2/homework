<?php

use controllers\log\Logger;

spl_autoload_register(function ($className) {
    $Base = __DIR__ . '/';

    $way = str_replace('\\', '/', $className);
    $file = $Base . $way . '.php';

    if (file_exists($file)) {
        require $file;
    } else {
        new Logger(new Exception );
        throw new Exception('в доступе отказано');
    }
}
);
