<?php

use admin\controllers\log\Logger;

include __DIR__ . '/../vendor/autoload.php';

spl_autoload_register(
/**
 * @throws Exception
 */
    function ($className) {
        $base = __DIR__ . '/';

        $way = str_replace('\\', '/', $className);
        $file = $base . $way . '.php';

        if (file_exists($file)) {
            require $file;
        } else {
            $log = new Logger();
            $log->log(new Exception(' в доступе отказано'));
            throw new Exception(' в доступе отказано');
        }
    }
);
