<?php

namespace admin\models;

use Exception;

/**
 *
 * класс предоставляет автора как объект
 */
class User extends Models
{
    /** константа названия таблици */
    public const TABLE = 'authors';

    /** @var int Id автора */
    public int $id;

    /** @var string имя автора */
    public string $author;

    /**
     * получаем имя автора,
     * проверяем в базе наличие автора,
     * если есть возвращаем его Id,
     * или создаем нового и так же возвращаем его Id
     * @param string $nameAuthor
     * @return int
     * @throws \Exception
     */
    public function getAuthorIdByName(string $nameAuthor): int
    {
        $id = $this->isAuthorExists($nameAuthor);

        if (is_array($id)) {
            return $id[0]->getId();
        }

        $this->createNewAuthors($nameAuthor);
        $infoUser = $this->isAuthorExists($nameAuthor);

        return $infoUser->getId();
    }

    /**
     * получаем обект
     * {@link Article} без автора
     * добовляем автора по author_id
     * в новости
     * и возвращаем в виде обекта {@link Article}
     *
     * @param \admin\models\Article $article
     * @return \admin\models\Article
     * @throws \Exception
     */
    public static function getFinNews(Article $article): Article
    {
        $idAuthor = User::getAuthorById($article->getAuthorId());

        if (null === $idAuthor){
            throw new Exception('не получилось получит автора');
        }
        $article->setAuthor($idAuthor->getAuthor());

        return $article;
    }

    /**
     * получаем автора по Id
     * возвращаем объект {@link  User}
     * @param $id
     * @return User|null
     * @throws \Exception
     */
    public static function getAuthorById($id): ?User
    {
        $db = new Bd();
        $answer = $db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE id=:id ',
            static::class,
            ['id' => $id]
        );
        if (null === $answer) {
            return null;
        }
        return $answer[0];
    }

    /**
     * добовляем нового автора с присвоением Id
     * @param string $name
     * @return User|null
     * @throws Exception
     */
    public function createNewAuthors(string $name): ?User
    {
        $db = new Bd();
        $sqlAuthor = 'INSERT INTO ' . User::TABLE . ' (author) VALUES (:author)';
        $nameAuthor = [':author' => $name];
        $res = $db->query($sqlAuthor, static::class, $nameAuthor);
        if (false === $res) {
            return null;
        }

        return $res[0];
    }

    /**
     * ишем Id автора по имени
     * @param string $name
     * @return User|null
     * @throws Exception
     */
    public function isAuthorExists(string $name): ?User
    {
        $db = new Bd();
        $answer = $db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE author=:author',
            static::class,
            [':author' => $name]
        );
        if (null === $answer) {
            return null;
        }

        return $answer[0];
    }

    /**
     * получаем Id автора
     * @return int
     */
    public
    function getId(): int
    {
        return $this->id;
    }

    /**
     * получаем имя автора
     * @return string
     */
    public
    function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $name
     * @return void
     */
    public
    function setAuthor(string $name): void
    {
        $this->author = $name;
    }
}