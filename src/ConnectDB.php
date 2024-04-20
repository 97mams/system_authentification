<?php

namespace App;

use PDO;

class ConnectDB
{
    public static function db()
    {
        return new PDO('mysql:dbname=users;host=127.0.0.1', 'root', '');
    }
}
