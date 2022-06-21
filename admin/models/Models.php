<?php

namespace admin\models;


use admin\controllers\log\Logger;

abstract class Models
{
    public const TABLE = '';
    public int $id;


    /**
     * получаем все новости
     * @return array
     * @throws \Exception
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
            new Logger(new \Exception('нет новостей'));
            throw new \Exception('нет новостей');
        }
        return $arr;
    }

    /**
     * находим новость по Id
     * @param string $id
     * @return array|false
     * @throws \Exception
     */
    public static function findById(string $id): array|false
    {
        $db = new Bd();
        $answer = $db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE id=:id ',
            static::class,
            ['id' => $id]
        );
        if (empty($answer)) {
            new Logger(new \Exception('нет такой новости'));
            throw new \Exception('нет такой новости');
        }
        $author = $answer[0]->getAuthorId();
        if (!empty($author)) {
            $name = User::authorById($author);
            $answer[0]->setAuthor($name[0]->getAuthor());
            return $answer;
        }
        return $answer;
    }


    /**
     * получаем данные,
     * записываем в массив,
     * проверяем наличие автора в безе
     * если есть пишем его Id
     * если нет создаем новый id
     * и вносим автора в базу
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

            if ('author_id' === $name) {
                $id = User::getAuthorId();
                if (!empty($id)) {
                    $data[':' . $name] = $id[0]->getId();
                    $cols[] = $name;
                    continue;
                }

                User::newIdAuthors();
                $newId = User::getAuthorId();
                $data[':' . $name] = $newId[0]->getId();
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
    private function delete(): void
    {
        $data = [':id' => $_POST['delete']];
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
        $data = [':title' => $_POST['newTitle'], ':content' => $_POST['newContent'], 'id' => $_POST['update']];
        $sql = 'UPDATE news SET title=:title, content=:content WHERE id=:id';
        $db = new Bd();
        $db->execute($sql, $data);
    }

    /**
     *определяем какую функцию вызывать,
     * удаление, обновление, запись
     * @return void
     */
    public function save(): void
    {

        if (isset($_POST['delete'])) {
            $this->delete();
        } elseif (isset($_POST['newNews'])) {
            $this->title = $_POST['newTitle'];
            $this->author_id = $_POST['author'];
            $this->content = $_POST['newContent'];
            $this->insert();
        } elseif (isset($_POST['update'])) {
            $this->update();
        }
    }

}