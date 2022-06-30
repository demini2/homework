<?php

namespace admin\models;
/**
 * клас предосталяет новости
 * в виде объекта
 */
class Article extends Models
{
    /** название таблицы в БД*/
    public const TABLE = 'news';

    /** @var int Id новости */
    public int $id;

    /** @var string заголовок новости */
    public string $title;

    /** @var string Id автора новости */
    public string $author_id;

    /** @var string имя автора */
    public string $author;
    /** @var string основной текст новости */
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
    public function getAuthorId(): string
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
