<?php

namespace app\controllers;


use Exception;
use app\view\View;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class Controllers
{

    protected View $view;


    public function __construct()
    {
        $this->view = new View();
        $file = new FilesystemLoader(__DIR__.'/../temp');
        $this->environment = new Environment($file);
    }

    /**
     * проверяем правила доступа
     * @return bool
     */
    protected function access(): bool
    {
        return true;
    }

    /**
     * проверяем права доступа и рисуем
     * шаблон
     * или ексепшен
     * @return mixed
     * @throws Exception
     */
    public function action()
    {
        if ($this->access()) {
            return $this->hendle();
        } else {
            throw new Exception('нет доступа');
        }
    }

    abstract protected function hendle();
}