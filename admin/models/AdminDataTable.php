<?php

namespace admin\models;

use admin\view\View;

/**
 * по слути не нужный класс
 */
class AdminDataTable
{
    /**
     * @var array массив новостей
     */
    protected array $model;

    /**
     * @var array массив функций
     */
    protected array $func;

    /**
     * @var View обект класса вью
     */
    protected View $view;

    /**
     * принимаем массив моделей и функций
     * создаем обект класса вью
     * @param array $model
     * @param array $func
     */
    public function __construct(array $model, array $func)
    {
        $this->view = new View();
        $this->model = $model;
        $this->func = $func;
    }

    /**
     * запускаем цыклы с массивом обекта и функций
     * применяя к каждому обекту фунции
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
     * рисуем шаблон передавая в него массив информации
     * @param array $arr
     * @return void
     * @throws \Exception
     */
    public function handle(array $arr=[]):void
    {

        $this->view->display('table.php',$arr);

    }
}