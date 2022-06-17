<?php

namespace app\models;

use app\models\Bd;

abstract class Models
{
    public const TABLE = '';
    public int $id;

    /**
     * @return array
     * @throws \Exception
     */
    public static function findAll(): array
    {
        $db = new Bd();
        return $db->query(
            'SELECT * FROM ' . static::TABLE,
            static::class,
            []
        );
    }

    /**
     * @param $id
     * @return array|false
     */
    public static function findById($id)
    {
        $db = new Bd();
        $answer = $db->query(
            'SELECT n.title, n.content, a.author FROM '
            . static::TABLE .
            ' AS n INNER JOIN authors AS a 
            on n.author_id = a.id 
            WHERE n.id=:id;',
            static::class,
            ['id' => $id]
        );
        if (empty($answer)) {
            return false;
        }

        return $answer;
    }
}