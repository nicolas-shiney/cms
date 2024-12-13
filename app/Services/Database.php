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
            error_log("[" . date('Y-m-d H:i:s') . "] [ERROR] Database connection failed: " . $e->getMessage(), 3, BASE_DIR . '/logs/app-errors.log');
            error_log("[" . date('Y-m-d H:i:s') . "] [INFO] User 'admin' logged in successfully.", 3, BASE_DIR . '/logs/app-info.log');


            die("Database connection failed. Check logs for details.");
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
        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            error_log("[" . date('Y-m-d H:i:s') . "] [ERROR] Database Query Error: " . $e->getMessage(), 3, BASE_DIR . '/logs/errors-info.log');
            error_log("[" . date('Y-m-d H:i:s') . "] [INFO] Query: " . $sql, 3, BASE_DIR . '/logs/app-info.log');
            error_log("[" . date('Y-m-d H:i:s') . "] [INFO] Parameters: " . json_encode($params), 3, BASE_DIR . '/logs/app-info.log');
            throw $e; // Re-throw for higher-level handling
        }
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
    public function execute(string $sql, array $params = []): void
    {
        $this->query($sql, $params);
    }

    /**
     * Returns the raw PDO connection for advanced usage.
     *
     * @return PDO The PDO connection.
     */
    public function getConnection(): PDO
    {
        return $this->connection;
    }






    private  $queries = [];

    /**
     * Loads query file from a YAML file.
     *
     * @param string $queryPath Path to the YAML query file.
     */
    public function loadQueries(string $queryPath): void
    {
        if (!file_exists($queryPath)) {
            throw new \RuntimeException("Query file not found: $queryPath");
        }
        $this->queries = Yaml::parseFile($queryPath);
    }

    /**
     * Get a query by its key.
     *
     * @param string $key The query key.
     * @return string The SQL query.
     */
    public function getQuery(string $key): string
    {
        if (!isset($this->queries[$key])) {
            throw new \InvalidArgumentException("Query not found for key: $key");
        }
        return $this->queries[$key];
    }


}
