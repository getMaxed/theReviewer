<?php

class Post {
    private $pdo;

    public function __construct()
    {
        $this->pdo = new Database;
    }
}