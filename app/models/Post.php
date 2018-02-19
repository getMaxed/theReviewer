<?php

class Post {
    private $pdo;

    public function __construct()
    {
        $this->pdo = new Database;
    }

    public function getPosts()
    {
        $this->pdo->query('SELECT *,
                            posts.id AS postId,
                            users.id AS userId,
                            posts.created_at AS postCreated,
                            users.created_at AS userCreated
                            FROM `posts`
                            INNER JOIN `users`
                            ON posts.user_id = users.id
                            ORDER BY posts.created_at DESC 
                            ');

        return $results = $this->pdo->resultSet();
    }
}
