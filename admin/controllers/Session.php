<?php

namespace admin\controllers;

class Session
{
    /**
     * запускаем сессию
     */
    public function __construct()
    {
    session_start();
    }
}