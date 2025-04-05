<?php
namespace src\Services;

use PDO;
use PDOException;

/**
 * Класс для работы с базой данных
 * Реализует паттерн Singleton для обеспечения единой точки доступа к БД
 */
class Db
{
    /** @var PDO Объект подключения к базе данных */
    private $connection;
    
    /** @var Db|null Единственный экземпляр класса */
    private static $instance = null;

    /**
     * Конструктор класса
     * Устанавливает соединение с базой данных
     * @throws PDOException при ошибке подключения
     */
    private function __construct()
    {
        $dbConfig = require __DIR__ . '/settings.php';
        $dsn = "mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']}";
        $this->connection = new PDO($dsn, $dbConfig['user'], $dbConfig['password']);
        $this->connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    /**
     * Выполняет SQL-запрос к базе данных
     * @param string $query SQL-запрос
     * @param array $params Параметры для подготовленного запроса
     * @return \PDOStatement Результат выполнения запроса
     */
    public function query(string $query, array $params = []): \PDOStatement
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);
        return $statement;
    }

    /**
     * Возвращает ID последней вставленной записи
     * @return string ID последней записи
     */
    public function getLastInsertId(): string
    {
        return $this->connection->lastInsertId();
    }

    /**
     * Возвращает единственный экземпляр класса
     * @return Db Экземпляр класса
     */
    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}