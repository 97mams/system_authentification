<?php

namespace models;

use PDO;

class Auth
{
    public function __construct(
        private PDO $pdo
    ) {
    }

    public function user(): ?Users
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $id = $_SESSION['auth'] ?: null;
        if ($id === null) {
            return null;
        }
        $query = $this->pdo->prepare("SELECT * From user Where id = ?");
        $query->execute([$id]);
        $user = $query->fetchObject(Users::class);

        return $user ?: null;
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

    public function isConnected(): bool
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $id = $_SESSION['auth'] ?: null;
        if ($id === null) {
            return false;
        }
        return true;
    }
}
