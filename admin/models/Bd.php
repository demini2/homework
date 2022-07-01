<?php


namespace admin\models;

use admin\controllers\log\Logger;
use Exception;
use Generator;
use PDO;

/**
 * класс устанавливающий связь с базой данных
 */
class Bd
{
    /** @var string имя хоста */
    protected string $host;
    /** @var string логин */
    protected string $login;
    /** @var string пароль */
    protected string $password;
    /** @var PDO объект класса ПДО */
    protected PDO $dbh;

    /**
     * устанавливаем соннект с базой данных
     * если не удалось ексепшен
     * @throws Exception
     */
    public function __construct()
    {
        $config = new Config();

        $this->host = $config->getHost();
        $this->login = $config->getLogin();
        $this->password = $config->getPassword();
        $this->dbh = new PDO($this->host, $this->login, $this->password);
    }

    /**
     * принимаем sql запрос,
     * массив подстановки (по у молчанию пустой),
     * и класс в виде которого будет возврашен результат
     * в случае успеха вернется массив объектов
     * @param string $sql
     * @param string $class
     * @param array $data
     * @return array|null
     * @throws Exception
     */
    public function query(string $sql, string $class, array $data = []): ?array
    {
        $sth = $this->dbh->prepare($sql);
        $sth->execute($data);
        $result = $sth->fetchAll(PDO::FETCH_CLASS, $class);
        if (false === $result) {
            $log = new Logger();
            $log->log(new Exception('Ошибка связанная с базой данных'));
            throw new Exception('Ошибка связанная с базой данных');
        }
        return $result;
    }

    /**
     * @param string $sql
     * @param string $class
     * @param array $data
     * @return Generator
     */
    public function queryEach(string $sql, string $class, array $data = []): Generator
    {
        $sth = $this->dbh->prepare(
            $sql, [PDO::ATTR_CURSOR => PDO::CURSOR_FWDONLY]);
        $sth->execute($data);
        $sth->setFetchMode(PDO::FETCH_CLASS, $class);
        while ($res = $sth->fetch()) {
            yield $res;
        }
    }

    /**
     * принимаем sql запрос
     * и массив подстановки (по у молчанию пустой)
     * получим true в случае успеха
     *
     * @param string $sql
     * @param array $params
     * @return bool
     */
    public function execute(string $sql, array $params = []): bool
    {
        $sth = $this->dbh->prepare($sql);
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