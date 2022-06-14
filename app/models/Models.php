<?php

namespace app\models;


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
    public static function findById($id): array|false
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
        return $answer;
    }

//    public function insert(): void
//    {
//        $fields = get_object_vars($this);
//        $cols = [];
//        $data = [];
//        foreach ($fields as $name => $value) {
//            if ('id' === $name) {
//                continue;
//            }
//            $cols[] = $name;
//            $data[':' . $name] = $value;
//        }
//        $sql = 'INSERT INTO ' . static::TABLE . '
//        (' . implode(',', $cols) . ')
//        VALUES
//        (' . implode(',', array_keys($data)) . ')';
//        echo $sql;
//        $db = new Bd();
//        $db->execute($sql, $data);
//
//    }
//
//    public function update2(): void
//    {
//        $data = [];
//        foreach ($_POST as $key => $item) {
//            $id = stristr($key, '=');
//            if (is_numeric($id)) {
//                $data[':' . $key] = $item;
//                $data = [':id' => $id];
//            }
//
//        }
//
//        $sql = 'UPDATE ' . static::TABLE . '
//        SET
//        ( author=:author, content=:content, title=:title )
//         WHERE
//         id=:id';
//
//        $db = new Bd();
//        $db->execute($sql, $data);
//
//
//    }

}