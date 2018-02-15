<?php

class Database {
    private $dsn = DSN;
    private $user = USER;
    private $password = PASSWORD;

    private $dbh;
    private $stmt;
    private $error;

    public function __construct()
    {
        $dsn = DSN;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->dbh = new PDO(DSN, USER, PASSWORD);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }

    }
}

