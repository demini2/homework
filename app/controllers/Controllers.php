<?php

namespace app\controllers;

use Exception;
use app\view\View;

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

    public function __invoke()
    {
        if ($this->access()){
           return $this->hendle();
        }else{
            throw new Exception('нет доступа');
        }
    }

    abstract protected function hendle();
}