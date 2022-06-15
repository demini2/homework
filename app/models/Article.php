<?php

namespace app\models;

class Article extends Models
{
    public const TABLE = 'news';

    public int $id;
    public string $title;
    public string $author_id;
    public string $author;
    public string $content;

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
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
    public function getAuthorId(): string
    {
        return $this->author_id;
    }

    /**
     * @param string $author
     */
    public function setAuthor(string $author): void
    {
        $this->author = $author;
    }
    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }
}
