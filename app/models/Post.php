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

    public function addPost($data)
    {
        $this->pdo->query('INSERT INTO `posts` (title, artist_name, album_name, album_year, album_rating, user_id, body, image) VALUES (:title, :artist_name, :album_name, :album_year, :album_rating, :user_id, :body, :image)');
        $this->pdo->bind(':title', $data['title']);
        $this->pdo->bind(':artist_name', $data['artist_name']);
        $this->pdo->bind(':album_name', $data['album_name']);
        $this->pdo->bind(':album_year', $data['album_year']);
        $this->pdo->bind(':album_rating', $data['album_rating']);
        $this->pdo->bind(':user_id', $data['user_id']);
        $this->pdo->bind(':body', $data['body']);
        $this->pdo->bind(':image', $data['image']);

        if ($this->pdo->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function updatePost($data)
    {
        $this->pdo->query('UPDATE posts SET title = :title, body = :body, image = :image WHERE id = :id');
        $this->pdo->bind(':id', $data['id']);
        $this->pdo->bind(':title', $data['title']);
        $this->pdo->bind(':body', $data['body']);
        $this->pdo->bind(':image', $data['image']);

        if ($this->pdo->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getPostById($id)
    {
        $this->pdo->query('SELECT * FROM `posts` WHERE `id` = :id');
        $this->pdo->bind(':id', $id);

        return $row = $this->pdo->single();
    }

    public function deletePost($id)
    {
        $this->pdo->query('DELETE FROM posts WHERE id = :id');
        $this->pdo->bind(':id', $id);

        if ($this->pdo->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
