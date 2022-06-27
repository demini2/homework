<?php

namespace admin\controllers;


class ErrorControllers extends Controllers
{
    /**
     * @return void
     * @throws \Exception
     */
    public function handle()
    {
        echo $this->environment->render('error.twig');
    }
}