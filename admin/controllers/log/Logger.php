<?php

namespace admin\controllers\log;

class Logger
{
    public function __construct(\Exception $exception)
    {
        $date = new \DateTimeImmutable();
        $time=$date->format('Y-m-d \ TH:i:');
        $line = $exception->getLine();
        $code = $exception->getCode();
        $file = $exception->getFile();
        $mess = $exception->getMessage();
        $array = "$time : $line : $file : $code : $mess";
        file_put_contents(
            __DIR__ . '/../../../../text/log.txt',
            $array);

    }

}