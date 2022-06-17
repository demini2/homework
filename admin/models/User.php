<?php

namespace admin\models;

use admin\controllers\log\Logger;


class User
{

    private const TABLE = 'authors';
    public int $id;
    public string $author;


    /**
     * @param $id
     * @return array|false
     * @throws \Exception
     */
    public static function authorById($id): array|false
    {
        $db=new Bd();
        $answer = $db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE id=:id ',
            static::class,
            ['id' => $id]
        );
        if (empty($answer)) {
            new Logger(new \Exception);
            throw new \Exception('Ошибка связанная с базой данных');
        }
        return $answer;
    }

    /**
     * добовляем нового автора с присвоением Id
     * @return array|false
     */
    public static function newIdAuthors(): array|false
    {
        $db=new Bd();
        $sqlAuthor = 'INSERT INTO ' . User::TABLE . ' (author) VALUES (:author)';
        $nameAuthor = [':author' => $_POST['author']];
        return $db->query($sqlAuthor, static::class, $nameAuthor);

    }

    /**
     * получаем Id всех авторов
     * @return array|false
     */
    public static function getAuthorId(): array|false
    {
        $db=new Bd();
        $answer = $db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE author=:author ',
            static::class,
            ['author' => $_POST['author']]
        );
        return $answer;
    }

    /**
     * получаем Id автора
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * получаем имя автора
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

}