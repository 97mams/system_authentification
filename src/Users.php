<?php

namespace App;

class Users
{

    public ?int $id;
    public string $username;
    public string $password;

    public function __construct()
    {
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername($username): void
    {
        $this->username = $username;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword($password): void
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public  function addUser(): bool
    {
        ConnectDB::db()->query("INSERT INTO user (username, password) VALUES ('" . $this->username . "', '" . $this->password . "')");
        return true;
    }
}
