<?php

class User {
    private $pdo;

    public function __construct()
    {
        $this->pdo = new Database();
    }

    public function register($data)
    {
        $this->pdo->query('INSERT INTO `users` (name, email, password) VALUES (:name, :email, :password)');
        $this->pdo->bind(':name', $data['name']);
        $this->pdo->bind(':email', $data['email']);
        $this->pdo->bind(':password', $data['password']);

        if ($this->pdo->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password)
    {
        $this->pdo->query('SELECT * FROM `users` WHERE email = :email');
        $this->pdo->bind(':email', $email);

        $row = $this->pdo->single();

        $hashed_password = $row->password;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    public function findUserByEmail($email)
    {
        $this->pdo->query('SELECT * FROM `users` WHERE `email` = :email');
        $this->pdo->bind(':email', $email);

        $row = $this->pdo->single();

        if ($this->pdo->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserById($id)
    {
        $this->pdo->query('SELECT * FROM `users` WHERE `id` = :id');
        $this->pdo->bind(':id', $id);

        return $row = $this->pdo->single();

    }
}