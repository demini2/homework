<?php

namespace admin\controllers;

use admin\models\Article;
use Exception;

/**
 * Контроллер для просмотра всех новостей
 */
class IndexControllers extends Controllers
{
    /**
     * получаем все новости
     * проверяем права доступа
     * если есть рисуем шаблон
     * @return void
     * @throws Exception
     */
    protected function handle(): void
    {
        echo $this->environment->render('index.twig', [
            'arr' => Article::findAll()
        ]);

    }
}