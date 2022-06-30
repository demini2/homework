<?php

namespace admin\controllers;


class ErrorControllers extends Controllers
{
    /**
     * класс-контроллер рисует
     * страницу в случае ошибки
     * @return void
     * @throws \Exception
     */
    public function handle():void
    {
        echo $this->environment->render('error.twig');
    }
}