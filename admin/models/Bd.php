<?php


namespace admin\models;

use admin\controllers\log\Logger;

class Bd

{
    protected string $host;
    protected string $login;
    protected string $password;
    protected \PDO $dbh;

    /**
     * устанавливаем соннект с базой данных
     * если не удалось ексепшен
     * @throws \Exception
     */
    public function __construct()
    {
        $config = new Config();
        if (is_string($str = $config->getHost())) {
            $this->host = $str;
            $this->login = $config->getLogin();
            $this->password = $config->getPassword();
            $this->dbh = new \PDO($this->host, $this->login, $this->password);
        } else {
            new Logger(new \Exception);
            throw new \Exception('не правильный путь к базе данных');
        }
    }

    /**
     * принимаем sql запрос,
     * массив подстановки (по у молчанию пустой),
     * и класс в виде которого будет возврашен результат
     * в случае успеха вернется массив объектов
     * @param string $sql
     * @param string $class
     * @param array $data
     * @return array|false
     */
    public function query(string $sql, string $class, array $data = []): array|false
    {

        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    /**
     * принимаем sql запрос
     * и массив подстановки (по у молчанию пустой)
     * получим тру в случае успеха
     *
     * @param string $sql
     * @param array $params
     * @return bool
     */
    public function execute(string $sql, array $params = []): bool
    {
        $dbh = new \PDO($this->host, $this->login, $this->password);
        $sth = $dbh->prepare($sql);
        return $sth->execute($params);
    }

    /**
     * получаем последний записаны Id
     * @return int
     */
    public function getLastId(): int
    {
        return $this->dbh->lastInsertId();
    }
}