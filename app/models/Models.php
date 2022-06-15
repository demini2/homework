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
            'SELECT * FROM ' . static::TABLE . ' WHERE id=:id ',
            static::class,
            ['id' => $id]
        );
        if (empty($answer)) {
            return false;
        }
        $author = $answer[0]->getAuthorId();
        if (!empty($author)){
            $name =User::authorById($author);
            $answer[0]->setAuthor($name[0]->getAuthor());
            return $answer;
        }
        return $answer;
    }
}