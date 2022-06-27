<?php

namespace admin\controllers\log;

use DateTimeImmutable;
use Exception;

class Logger
{
    /**
     * создаем класс исключения
     * записываем в текстовый фаил
     * время ошибки,
     * фаил, строку,сообщение
     *
     * @param Exception $exception
     */
    public function __construct(Exception $exception)
    {
        $date = new DateTimeImmutable();
        $time = $date->format('Y-m-d \ TH:i:');
        $line = $exception->getLine();
        $code = $exception->getCode();
        $file = $exception->getFile();
        $mess = $exception->getMessage();

        $array = "$time; $line;  $file; $code; $mess \n";

        $way = __DIR__.'/log.txt';

        file_put_contents($way, $array,FILE_APPEND);

    }

}