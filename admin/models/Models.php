<?php

namespace admin\models;


use admin\controllers\log\Logger;
use Exception;

abstract class Models
{
    public const TABLE = '';
    public int $id;


    /**
     * получаем все новости
     * @return array
     * @throws Exception
     */
    public static function findAll(): array
    {
        $db = new Bd();
        $arr = $db->query(
            'SELECT * FROM ' . static::TABLE,
            static::class,
            []
        );
        if (empty($arr)) {
//            new Logger(new Exception('нет новостей'));
//            throw new Exception('нет новостей');
        }
        return $arr;
    }

    /**
     * находим новость по Id
     * @param string $id
     * @return array
     * @throws Exception
     */
    public static function findById(string $id): array
    {
        $db = new Bd();
        $answer = $db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE id=:id ',
            static::class,
            ['id' => $id]
        );
        if (empty($answer)) {
            new Logger(new Exception('нет такой новости'));
            throw new Exception('нет такой новости');
        }

        $name = User::authorById($answer[0]->getAuthorId());
        $answer[0]->setAuthor($name[0]->getAuthor());
        return $answer;

    }


    /**
     * получаем данные,
     * записываем в массив,
     * проверяем наличие автора в базе
     * если есть пишем его Id
     * если нет создаем новый id
     * и вносим автора в базу
     * передаем sql запрос в базу
     * @return void
     */
    public function insert(): void
    {
        $user = new User();
        $fields = get_object_vars($this);

        $cols = [];
        $data = [];

        foreach ($fields as $name => $value) {
            if ('id' === $name) {
                continue;
            }

            if ('author_id' === $name) {
                $id = $user->issetAuthor($this->author_id);
                if (!empty($id)) {
                    $data[':' . $name] = $id[0]->getId();
                    $cols[] = $name;
                    continue;
                }
                $user->newAuthors($this->author_id);
                $infoUser = $user->issetAuthor($this->author_id);
                $data[':' . $name] = $infoUser[0]->getId();
                $cols[] = $name;
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
        $data = [':title' => $this->title, ':content' => $this->content, 'id' => $this->id];
        $sql = 'UPDATE ' . static::TABLE . ' SET title=:title, content=:content WHERE id=:id';
        $db = new Bd();
        $db->execute($sql, $data);
    }

    /**
     * определяем какую функцию вызывать,
     * обновление, запись
     * @return void
     */
    public function save(): void
    {
        if (isset($this->id)) {
            $this->update();
            exit;
        }
        $this->insert();


    }

}