<?php

namespace app\models;

class Article extends Models
{
    public const TABLE = 'news';

    public int $id;
    public string $author;
    public string $title;
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

}
