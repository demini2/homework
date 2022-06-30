<?php

namespace admin\controllers;

use admin\controllers\log\Logger;
use Exception;
use admin\view\View;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * базовый класс контроллера
 * проверяет права доступа и рисует шаблон
 */
abstract class Controllers
{
    /** @var View $view */
    protected View $view;


    /**@var Environment */
    public Environment $environment;

    /**
     * создаем в классе:
     * класс сессии
     * клас view
     */
    public function __construct()
    {

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
            return $this->handle();
        } else {
            $loog = new Logger();
            $loog->loog(new Exception('нет доступа'));
            throw new Exception('нет доступа');

        }
    }

    abstract protected function handle();
}