<?php

class Database {

    private static $host = "127.0.0.1";
    private static $db   = "incregym";
    private static $user = "root";
    private static $pass = "";
    private static $port = "3306";

    private static $pdo = null;

    public static function connect() {

        if (self::$pdo === null) {

            $dsn = "mysql:host=" . self::$host . ";dbname=" . self::$db . ";port=" . self::$port . ";charset=utf8mb4";

            try {
                self::$pdo = new PDO($dsn, self::$user, self::$pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]);
            } catch (PDOException $e) {
                die("Error en la conexión a la base de datos: " . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}