<?php

namespace admin\models;

use admin\view\View;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class AdminDataTable
{
    protected array $model;
    protected array $func;
    protected View $view;

    public function __construct(array $model, array $func)
    {
        $this->view = new View();
        $this->model = $model;
        $this->func = $func;
    }

    /**
     * получаем массив контента
     * @return array
     */
    public function renderTab(): array
    {
        $arr = [];
        foreach ($this->model as $m) {
            foreach ($this->func as $z) {
                $arr[] = $z($m);
            }
        }
        return $arr;
    }

    /**
     * рисуем шаблон
     * @param array $arr
     * @return void
     * @throws \Exception
     */
    public function hendle(array $arr=[]):void
    {

        $this->view->display('table.php',$arr);

    }
}