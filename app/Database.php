<?php

namespace App\Database;

use PDO;
use PDOException;

class Connection 
{
    private static ?PDO $pdo = null;

    public function __construct() 
    {
        if (self::$pdo === null) {
            try {
                $host = getenv('DB_HOST');
                $dbname = getenv('DB_NAME');
                $user = getenv('DB_USER');
                $password = getenv('DB_PASSWORD');

                $dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
                self::$pdo = new PDO($dsn, $user, $password);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }
    }

    public static function get(): PDO
    {
        if (self::$pdo === null) {
            new self(); // Trigger constructor
        }

        return self::$pdo;
    }

    public static function query(string $sql, array $params = [])
    {
        $stmt = self::get()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}
