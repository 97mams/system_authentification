<?php

namespace models;

class App
{

    public static function getAut(): Auth
    {
        return new Auth(ConnectDB::db());
    }
}
