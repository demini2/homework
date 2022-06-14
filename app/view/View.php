<?php

namespace app\view;


class View
{
    private array $arrayContent = [];

//    /**
//     * запись в асициативный массив
//     * @param string $name
//    //     * @param string $value
//    //     * @return void
//     */
//    public function assign(string $name, array $date=[]): string
//    {
//        $templates = __DIR__ . '/../templates/' . $name .'.php';
//        ob_start();
//        $date;
//        include $templates;
//        $content = ob_get_contents();
//
//        ob_clean();
//        return  $content;
//    }
//
//    /**
//     * вывод буфера
//     * @param $temp - буфер
//     * @return void
//     */
//    public function display(string $temp): void
//    {
//
//        echo $this->arrayContent[$temp];
//    }
//
//
//    /**
//     * вывод буфера
//     * @param string $name - буфер
//     * @return mixed
//     */
//    public function render(string $name): mixed
//    {
//        return require $name;
//    }

    public function __set(string $name, array $values): void
    {
        $this->arrayContent[$name] = $values;
    }

    public function __get(string $name): array|null
    {
        return $this->arrayContent[$name] ?? null;
    }

    public function __isset(string $name): bool
    {
        return isset($this->arrayContent[$name]);
    }

    private function render(string $template): string
    {
        $wey = __DIR__ . '/../templates/' . $template;
        ob_clean();
        include $wey;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    public function display(string $template): void
    {
        echo $this->render($template);
    }
}