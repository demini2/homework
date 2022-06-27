<?php

namespace admin\models;

class Article extends Models
{
    public const TABLE = 'news';

    public int $id;
    public string $title;
    public string $author_id;
    public string $author;
    public string $content;

    /**
     * получаем конттент
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * получаем заголовок
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * получаем Id
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * получаем Id автора
     * @return string
     */
    public  function getAuthorId(): string
    {
        return $this->author_id;
    }

    /**
     * устанавливаем имя автора
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
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
