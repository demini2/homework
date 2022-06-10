<?php
spl_autoload_register(function ($className) {
    $Base = __DIR__ . '/';

    $way = str_replace('\\', '/', $className);
    $file = $Base . $way . '.php';

//if (file_exists($file)) {
    require $file;
//} else {
//throw new Exception('в доступе отказано');
//}
}
);
