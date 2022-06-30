<?php

namespace admin\models;

use Exception;

/**
 * класс предоставляет автора как объект
 */
class User extends Models
{
    /** константа названия таблици */
    public const TABLE = 'authors';

    /** @var int Id автора  */
    public int $id;

    /** @var string имя автора  */
    public string $author;

    /**
     * @param string $nameAuthor
     * @return int
     * @throws \Exception
     */
    public function getAuthorId(string $nameAuthor):int
    {

        $id = $this->issetAuthor($nameAuthor);
        if (!empty($id)) {
            return $id[0]->getId();
        }
        $this->newAuthors($nameAuthor);
        $infoUser = $this->issetAuthor($nameAuthor);
        return $infoUser[0]->getId();
    }

    /**
     * получаем Id всех авторов
     * @param $id
     * @return array|null
     * @throws Exception
     */
    public static function authorById($id): ?array
    {
        $db = new Bd();
        $answer = $db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE id=:id ',
            static::class,
            ['id' => $id]
        );
        if (false === $answer) {
            return null;
        }
        return $answer;
    }

    /**
     * добовляем нового автора с присвоением Id
     * @param string $name
     * @return array|null
     * @throws Exception
     */
    public function newAuthors(string $name): ?array
    {
        $db = new Bd();
        $sqlAuthor = 'INSERT INTO ' . User::TABLE . ' (author) VALUES (:author)';
        $nameAuthor = [':author' => $name];
        $res = $db->query($sqlAuthor, static::class, $nameAuthor);
        if (false === $res) {
            return null;
        }
        return $res;

    }

    /**
     * ишем Id автора по имени
     * @param string $name
     * @return array|null
     * @throws Exception
     */
    public function issetAuthor(string $name): ?array
    {
        $db = new Bd();
        $answer = $db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE author=:author',
            static::class,
            [':author' => $name]
        );
        if (false === $answer) {
            return null;
        }
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

    /**
     * @param string $name
     * @return void
     */
    public function setAuthor(string $name): void
    {
        $this->author = $name;
    }
}