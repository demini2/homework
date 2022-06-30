<?php

namespace app\controllers;


use Exception;
use app\view\View;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

/**
 * базовый класс контроллера
 * @property \Twig\Environment $environment
 */
abstract class Controllers
{
    /**
     * @var \app\view\View объект класса
     */
    protected View $view;

    /**
     * создаем объект класса вью
     * и подключаем твиг
     */
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
    public function action():mixed
    {
        if ($this->access()) {
            return $this->handle();
        } else {
            throw new Exception('нет доступа');
        }
    }

    abstract protected function handle();
}