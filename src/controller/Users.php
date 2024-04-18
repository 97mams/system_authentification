<?php

namespace App\controller;

class User
{

    public function __construct(
        private ?int $id,
        private string $username,
        private string $password,
        private string $role,
        public \PDO $pdo
    ) {
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
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
        $this->password = password_hash($password, 12);
    }

    public function getRole(): string
    {
        return $this->role;
    }

    public function setRole($role): void
    {
        $this->role = $role;
    }

    public function addUser(): void
    {
        $query = $this->pdo->query("INSERT INTO user (username, password, role) VALUES (?, ?, ?);");
        $query->execute(['usename' => $this->username, 'password' => $this->password, 'role' => $this->role]);
    }
}
