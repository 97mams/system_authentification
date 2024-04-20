<?php

namespace App;

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

    public function login(string $username, string $password): ?Users
    {
        $query = $this->pdo->prepare("SELECT * From user Where username = :username");
        $query->execute(['username' => $username]);
        $user = $query->fetchObject(Users::class);
        if ($user === false) {
            return null;
        }

        if (password_verify($password, $user->password)) {
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
            $_SESSION['auth'] = $user->id;
            return $user;
        }
        return null;
    }
}
