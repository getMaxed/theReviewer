<?php

class User {
    private $pdo;

    public function __construct()
    {
        $this->pdo = new Database();
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
}