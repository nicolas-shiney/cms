<?php
/**
 * Created by Vim.
 * User: nicolas
 * Date: 2024-12-10
 * Time: 19:43
 */


namespace App\Services;

use PDO;
use PDOException;
use Symfony\Component\Yaml\Yaml;

class Database
{
    private $connection;

    /**
     * Constructor to initialize the database connection.
     *
     * @param string $configPath Path to the YAML config file.
     */
    public function __construct(string $configPath)
    {
        try {
            $config = $this->loadConfig($configPath);

            $dsn = sprintf(
                'mysql:host=%s;port=%s;dbname=%s;charset=%s',
                $config['host'],
                $config['port'],
                $config['dbname'],
                $config['charset']
            );

            $this->connection = new PDO(
                $dsn,
                $config['username'],
                $config['password'],
                $config['options'] ?? []
            );

            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    /**
     * Loads database configuration from a YAML file.
     *
     * @param string $configPath Path to the YAML config file.
     * @return array The database configuration.
     */
    private function loadConfig(string $configPath): array
    {
        if (!file_exists($configPath)) {
            throw new \RuntimeException("Database configuration file not found: $configPath");
        }

        return Yaml::parseFile($configPath);
    }

    /**
     * Executes a query and returns the PDOStatement.
     *
     * @param string $sql The SQL query.
     * @param array $params Parameters for the prepared statement.
     * @return \PDOStatement The PDOStatement object.
     */
    public function query(string $sql, array $params = []): \PDOStatement
    {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    /**
     * Fetches all rows from a query.
     *
     * @param string $sql The SQL query.
     * @param array $params Parameters for the prepared statement.
     * @return array The result set as an associative array.
     */
    public function fetchAll(string $sql, array $params = []): array
    {
        return $this->query($sql, $params)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Fetches a single row from a query.
     *
     * @param string $sql The SQL query.
     * @param array $params Parameters for the prepared statement.
     * @return array|null The result row as an associative array or null if not found.
     */
    public function fetchOne(string $sql, array $params = []): ?array
    {
        $result = $this->query($sql, $params)->fetch(PDO::FETCH_ASSOC);
        return $result ?: null;
    }

    /**
     * Executes a query without returning a result set (e.g., INSERT, UPDATE, DELETE).
     *
     * @param string $sql The SQL query.
     * @param array $params Parameters for the prepared statement.
     * @return bool True on success, false otherwise.
     */
    public function execute(string $sql, array $params = []): bool
    {
        return $this->query($sql, $params)->execute();
    }

    /**
     * Returns the raw PDO connection for advanced usage.
     *
     * @return \PDO The PDO connection.
     */
    public function getConnection(): PDO
    {
        return $this->connection;
    }
}
