<?php

namespace admin\view;

use admin\controllers\log\Logger;

class View
{
    private array $arrayContent = [];

    /**
     * @param string $name
     * @param array $values
     * @return void
     */
    public function __set(string $name, array $values): void
    {
        $this->arrayContent[$name] = $values;
    }

    /**
     * @param string $name
     * @return array|null
     */
    public function __get(string $name): array|null
    {
        return $this->arrayContent[$name] ?? null;
    }

    /**
     * @param string $name
     * @return bool
     */
    public function __isset(string $name): bool
    {
        return isset($this->arrayContent[$name]);
    }

    /**
     * @param string $template
     * @return string
     * @throws \Exception
     */
    private function render(string $template): string
    {
        $wey = __DIR__ . '/../templates/' . $template;
        ob_clean();
        include $wey;
        $content = ob_get_contents();
        ob_end_clean();
        if (empty($content)) {
            new Logger(new \Exception);
            throw new \Exception('нет контента');
        }
        return $content;
    }

    /**
     * @param string $template
     * @return void
     * @throws \Exception
     */
    public function display(string $template): void
    {
        echo $this->render($template);
    }
}