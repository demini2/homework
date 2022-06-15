<?php


namespace app\models;

use controllers\log\Logger;

class Bd

{
    protected string $host;
    protected string $login;
    protected string $password;
    protected \PDO $dbh;

    /**
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
            new Logger(new \Exception );

            throw new \Exception('не правильный путь к базе данных');
        }
    }

    public function query(string $sql, string $class, array $data = []): array|false
    {

        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function execute(string $sql, array $params = []): bool
    {
        $dbh = new \PDO($this->host, $this->login, $this->password);
        $sth = $dbh->prepare($sql);
        return $sth->execute($params);
    }


}