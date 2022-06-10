<?php

namespace models;


abstract class Models
{
    public const TABLE = '';
    public int $id;
    public int $yt;

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
    public function findById($id): array|false
    {
        $this->yt = $id;
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

    private function insert(): void
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

    public function save(): void
    {
        if (empty($_POST)) {
            exit();
        }
        if (isset($_POST['delete'])) {
            $this->delete();
        } elseif (isset($_POST['newNews'])) {
            $this->title = $_POST['newTitle'];
            $this->content = $_POST['newContent'];
            $this->insert();
        } elseif (isset($_POST['update'])) {

            $this->update();
        }

    }

    private function delete(): void
    {
        $data = [':id' => $_POST['delete']];
        $sql = 'DELETE FROM ' . static::TABLE . ' WHERE id=:id ';
        $db = new Bd();
        $db->execute($sql, $data);
    }

    public function update()
    {
        $data = [':title' => $_POST['newTitle'], ':content' => $_POST['newContent'], 'id' => $_POST['update']];
        $sql = 'UPDATE news SET title=:title, content=:content WHERE id=:id';
        $db = new Bd();
        $db->execute($sql, $data);
    }
}