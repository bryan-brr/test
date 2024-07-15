<?php

final class Database {
    private static $instance = null;
    private $connection;
    private $dsn;

    private function __clone() {}

    private function __construct() {
        $this->dsn = "mysql:host=mariadb;dbname=test_users;charset=utf8mb4";
        try {
            $this->connection = new PDO($this->dsn, "root", "your_password");
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        catch (PDOException $e) {
            throw new Exception("Database connection error: " . $e->getMessage());
        }
    }

    public static function getInstance(): Database {
        if (self::$instance === null) {
            self::$instance = new Database();
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

//Usage Example:
try {
    // Get the singleton instance of the Database class
    $db = Database::getInstance();
    // Get the PDO connection
    $connection = $db->getConnection();

    // Example query
    $query = $connection->query("SELECT * FROM users");
    $results = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($results as $row) {
        echo $row['user_id'] . " " . $row['user_name'] . " " . $row['user_surname'] . " " . $row['user_age'] . " " . $row['user_email'] . '<br>';
    }
    // Close the connection (optional, as it will be closed at the end of the script execution)
    $db->closeConnection();
}
catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}



