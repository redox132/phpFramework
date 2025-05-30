<?php

namespace App;

use PDO;
use PDOException;

require_once __DIR__ . '/../vendor/autoload.php'; // Adjust path if needed

use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__ . '/../'); // Path to your project root
$dotenv->load();


class Database
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
                self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Database connection failed: " . $e->getMessage());
            }
        }
    }

    public static function connection(): PDO
    {
        if (self::$pdo === null) {
            new self(); // we trigger the contructor if the pdo is null. Mostly, it's triggred automatically
        }

        return self::$pdo;
    }

    public static function query(string $sql, array $params = [])
    {
        $stmt = self::connection()->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}
