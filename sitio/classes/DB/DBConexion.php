<?php
namespace App\DB;

use Exception;
use PDO;

class DBConexion
{
    private static string $db_host     = "localhost";
    private static string $db_name     = "dw3_guaman_alvin";
    private static string $db_charset  = "utf8mb4";
    private static string $db_user     = "root";
    private static string $db_pass     = "";

    private static ?PDO $db = null;

    public static function openConnection()
    {
        $db_dsn = "mysql:host=" . self::$db_host . ";dbname=" . self::$db_name . ";charset=" . self::$db_charset;

        try {
            self::$db = new PDO($db_dsn, self::$db_user, self::$db_pass);
        } catch(Exception $e) {
            echo "Error al conectar con la base de datos. Por favor, intentá de nuevo más tarde.";
            exit;
        }
    }

    public static function getDB(): PDO
    {
        if(self::$db === null){
        self::openConnection();
        }

        return self::$db;
    }
}
