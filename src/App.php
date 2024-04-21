<?php

namespace App;

class App
{

    public static function getAut(): Auth
    {
        return new Auth(ConnectDB::db());
    }
}
