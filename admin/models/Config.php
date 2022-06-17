<?php

namespace admin\models;

final class Config
{
    private string $host = 'mysql:host=localhost;dbname=test';
    private string $login = 'admin';
    private string $password = 'root';

    public function getHost(): string
    {
        return $this->host;
    }

    public function getLogin(): string
    {
        return $this->login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}