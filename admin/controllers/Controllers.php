<?php

namespace controllers;

use controllers\log\Logger;
use Exception;
use view\View;

abstract class Controllers
{

    protected View $view;

    public function __construct()
    {
        $this->view = new View();
    }


    protected function access(): bool
    {
        return true;
    }

    public function action()
    {
        if ($this->access()){
           return $this->hendle();
        }else{
            new Logger(new Exception );
            throw new Exception('нет доступа');

        }
    }

    abstract protected function hendle();
}