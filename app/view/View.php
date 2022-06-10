<?php

namespace app\view;


class View
{
    protected string $templates;
    private array $arrayContent = [];

    /**
     * запись в асициативный массив
     * @param string $name
    //     * @param string $value
    //     * @return void
     */
    public function assign(string $name, array $date=[]): string
    {
        $templates = __DIR__ . '/../templates/' . $name .'.php';
        ob_start();
        $date;
        include $templates;
        $content = ob_get_contents();

        ob_clean();
        return  $content;
    }

    /**
     * вывод буфера
     * @param $temp - буфер
     * @return void
     */
    public function display(string $temp): void
    {

        echo $this->arrayContent[$temp];
    }


    /**
     * вывод буфера
     * @param string $name - буфер
     * @return mixed
     */
    public function render(string $name): mixed
    {
        return require $name;
    }
}