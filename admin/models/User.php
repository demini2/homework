<?php

namespace models;

class User
{

    private const TABLE = 'authors';
    public int $id;
//    public string $author_id;
    public string $author;


    public static function authorById($id): array|false
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

    public static function newIdAuthors()
    {
        $db = new Bd();
        $sqlAuthor = 'INSERT INTO authors (author) VALUES (:author)';
        $nameAuthor = [':author' => $_POST['author']];
        return $db->query($sqlAuthor, static::class, $nameAuthor);

    }

    /**
     *
     */
    public static function getAuthorId()
    {
        $db = new Bd();
        $answer = $db->query(
            'SELECT * FROM ' . static::TABLE . ' WHERE author=:author ',
            static::class,
            ['author' => $_POST['author']]
        );

        return $answer;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

}