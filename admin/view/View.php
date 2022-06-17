<?php

namespace admin\view;

use admin\controllers\log\Logger;

class View
{
    private array $arrayContent = [];

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
        if (empty($content)){
            new Logger(new \Exception );
            throw new \Exception('нет контента');
        }
        return $content;
    }

    public function display(string $template): void
    {
        echo $this->render($template);
    }
}