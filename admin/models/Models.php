<?php

namespace admin\models;

use Exception;

/**
 *
 * исходный базавый класс
 */
abstract class Models
{
    /** константа названия таблицы*/
    public const TABLE = '';

    /** @var int Id */
    public int $id;

    /**
     * получаем все записи
     * @return array|null
     * @throws \Exception
     */
    public static function findAll(): ?array
    {
        $db = new Bd();
        $arr = $db->query(
            'SELECT * FROM ' . static::TABLE,
            static::class,
            []
        );

        if (empty($arr)) {
            return null;
        }

        return $arr;
    }

    /**
     * находим записи по Id
     * @param string $id
     * @return object|null
     * @throws \Exception
     */
    public static function findById(string $id): ?object
    {
        $db = new Bd();
        $answer = $db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE id=:id ',
            static::class,
            ['id' => $id]
        );

        if (empty($answer)) {
            return null;
        }

        return $answer[0];
    }


    /**
     * получаем данные,
     * записываем в массив,
     * передаем sql запрос в базу
     * @return void
     */
    public function insert(): void
    {
        $fields = get_object_vars($this);

        $cols = [];
        $data = [];

        foreach ($fields as $name => $value) {
            if ('id' === $name) {
                continue;
            }
            $cols[] = $name;
            $data[':' . $name] = $value;
        }

        $sql = 'INSERT INTO ' . static::TABLE . '
        (' . implode(',', $cols) . ')
        VALUES 
        (' . implode(',', array_keys($data)) . ')';
        $db = new Bd();
        $db->execute($sql, $data);
        $this->id = $db->getLastId();
    }

    /**
     * удаляем конкретную новость
     * по Id
     * @return void
     */
    public function delete(): void
    {
        $data = [':id' => $this->id];
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id ';
        $db = new Bd();
        $db->execute($sql, $data);
    }

    /**
     * обновление данных в поле
     * по данному Id
     * @return void
     */
    public function update(): void
    {
        $fields = get_object_vars($this);

        $cols = [];
        $data = [];

        foreach ($fields as $name => $value) {
            if ('id' === $name) {
                continue;
            }
            $cols[] = $name . ' = :' . $name;
            $data[':' . $name] = $value;
        }

        $sql = 'UPDATE ' . static::TABLE . ' SET ' .
            implode(', ', $cols) .
            ' WHERE id = ' . $this->id;

        $db = new Bd();
        $db->execute($sql, $data);

    }

    /**
     * определяем какую функцию вызывать,
     * обновление, запись
     * @return void
     * @throws Exception
     */
    public function save(): void
    {
        if (isset($this->id)) {
            $this->update();
            return;
        }

        $this->insert();
    }

}