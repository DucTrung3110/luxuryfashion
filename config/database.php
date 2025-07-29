<?php
require_once 'config.php';

class Database
{
    private static $instance = null;

    private $host;
    private $dbname;
    private $username;
    private $password;
    private $port;
    private $pdo;

    private function __construct()
    {
        $this->host = DB_HOST;
        $this->dbname = DB_NAME;
        $this->username = DB_USER;
        $this->password = DB_PASS;
        $this->port = DB_PORT;

        $this->connect();
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    private function connect()
    {
        try {
            $dsn = "mysql:host={$this->host};port={$this->port};dbname={$this->dbname};charset=utf8mb4";

            debugLog("Connecting to database: $dsn");

            $this->pdo = new PDO($dsn, $this->username, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]);

            debugLog("Database connection successful");
        } catch (PDOException $e) {
            $error = 'Database connection failed: ' . $e->getMessage();
            debugLog($error);
            if (DEBUG_MODE) {
                die($error);
            } else {
                die('Database connection error. Please try again later.');
            }
        }
    }

    public function getConnection()
    {
        return $this->pdo;
    }

    public function query($sql, $params = [])
    {
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            $error = 'Database query failed: ' . $e->getMessage();
            debugLog($error);
            throw new Exception($error);
        }
    }

    public function lastInsertId()
    {
        return $this->pdo->lastInsertId();
    }
}
