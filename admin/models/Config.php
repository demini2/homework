<?php

namespace admin\models;

final class Config
{
    private string $host = 'mysql:host=localhost;dbname=test';
    private string $login = 'admin';
    private string $password = 'root';

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @return string
     */
    public function getLogin(): string
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}