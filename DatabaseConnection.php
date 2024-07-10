<?php
//interface DBConnectionInterface {}
class Database {
    private static $instance = null;
    private $connection;

    private function __construct($config) {
        try {
            $this->connection = new PDO($config['dsn'], $config['username'], $config['password']);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            //error_log("Connection failed: " . $e->getMessage());
            throw new Exception("Database connection error");
        }
    }
  
    private function init(): array {
      
    }

    public static function getInstance($config): Database {
        if (self::$instance === null) {
            self::$instance = new Database($config);
        }
        return self::$instance;
    }

    public function getConnection(): PDO {
        return $this->connection;
    }
    public function closeConnection(): void {
        $this->connection = null;
    }
}
