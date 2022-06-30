<?php

namespace app\view;

/**
 * класс отображения
 */
class View
{
    /**
     * @var array массив свойтв и значений
     */
    private array $arrayContent = [];

    /**магический метод
     * записывает в массив значение и свойтво
     * @param string $name
     * @param array $values
     * @return void
     */
    public function __set(string $name, array $values): void
    {
        $this->arrayContent[$name] = $values;
    }

    /**
     * магический метод возврашает значение по имени свойста
     * или нулл
     * @param string $name
     * @return array|null
     */
    public function __get(string $name): ?array
    {
        return $this->arrayContent[$name] ?? null;
    }

    /**
     * магический метод
     * проверяет сущетвование
     * свойства в массиве
     * @param string $name
     * @return bool
     */
    public function __isset(string $name): bool
    {
        return isset($this->arrayContent[$name]);
    }

    /**
     * рисует шаблон и возвращает
     * информацию в виде строки
     * @param string $template
     * @return string
     */
    private function render(string $template): string
    {
        $wey = __DIR__ . '/../temp/' . $template;
        ob_clean();
        include $wey;
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }

    /**
     * рисует шаблон
     * @param string $template
     * @return void
     */
    public function display(string $template): void
    {
        echo $this->render($template);
    }
}