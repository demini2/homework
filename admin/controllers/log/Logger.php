<?php

namespace admin\controllers\log;

class Logger
{
    /**
     * создаем клас исключения
     * записываем в текстовый фаил
     * время ошибки,
     * фаил, строку,сообщение
     *
     * @param \Exception $exception
     */
    public function __construct(\Exception $exception)
    {
        $date = new \DateTimeImmutable();
        $time = $date->format('Y-m-d \ TH:i:');
        $line = $exception->getLine();
        $code = $exception->getCode();
        $file = $exception->getFile();
        $mess = $exception->getMessage();
        $array = $time. '; '. $line. '; '. $file. '; '. $code.
            '; '. $mess. "\n";
        $way = __DIR__ . '/../../../../text/log.txt';
        file_put_contents(
            $way,
            $array, FILE_APPEND);

    }

}