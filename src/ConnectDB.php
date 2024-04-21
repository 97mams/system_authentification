<?php

namespace App;

use PDO;

class ConnectDB
{
    public static $pdo;
    public static function db(): PDO
    {
        if (!self::$pdo) {
            self::$pdo = new PDO('mysql:dbname=users;host=127.0.0.1', 'root', '');
        }
        return self::$pdo;
    }
}
