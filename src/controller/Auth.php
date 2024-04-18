<?php

namespace App\controller;

use PDO;

class Auth
{
    public function __construct(
        private PDO $pdo
    ) {
    }

    public function user()
    {
    }

    public function login(string $username, string $password): ?User
    {
        $query = $this->pdo->prepare("SELECT * From user Where username = :username");
        $query->execute(['username' => $username]);
        $query->setFetchMode(PDO::FETCH_CLASS, User::class);
        $user = $query->fetch();
        if ($user === false) {
            return null;
        }

        if (password_verify($password, $user->password)) {
            return $user;
        }
        return null;
    }
}
