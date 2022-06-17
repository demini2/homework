<?php

namespace admin\controllers;

use admin\controllers\log\Logger;
use Exception;
use admin\view\View;

abstract class Controllers
{

    protected View $view;
    protected Session $session;

    public function __construct()
    {
        $this->session = new Session();
        $this->view = new View();
    }


    protected function access(): bool
    {
        return true;
    }

    public function action()
    {
        if ($this->access()) {
            return $this->hendle();
        } else {
            new Logger(new Exception);
            throw new Exception('нет доступа');

        }
    }

    abstract protected function hendle();
}