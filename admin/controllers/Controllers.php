<?php

namespace admin\controllers;

use admin\controllers\log\Logger;
use Exception;
use admin\view\View;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class Controllers
{

    protected View $view;
    protected Session $session;
    public Environment $environment;

    /**
     * создаем в классе:
     * класс сессии
     * клас view
     */
    public function __construct()
    {
        $this->session = new Session();
        $this->view = new View();
        $file = new FilesystemLoader('tempAdmin');
        $this->environment = new Environment($file);
    }

    /**
     * проверяем прова доступа
     * @return bool
     */
    protected function access(): bool
    {
        return true;
    }

    /**
     * выполняем права доступа
     * ресуем шаблон
     * или ексепшен
     * @return mixed
     * @throws Exception
     */
    public function action(): mixed
    {
        if ($this->access()) {
            return $this->hendle();
        } else {
            new Logger(new Exception('нет доступа'));
            throw new Exception('нет доступа');

        }
    }

    abstract protected function hendle();
}