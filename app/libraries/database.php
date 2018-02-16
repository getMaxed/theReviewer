<?php

class Database {
    private $dsn = DSN;
    private $user = USER;
    private $password = PASSWORD;

    private $pdo;
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
            $this->pdo = new PDO(DSN, USER, PASSWORD);
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
            echo $this->error;
        }
    }

    public function query($sql)
    {
        $this->stmt = $this->pdo->prepare($sql);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute()
    {
        return $this->stmt->execute();
    }

    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

/*
|--------------------------------------------------------------------------
| To get a single record as object
|--------------------------------------------------------------------------
*/    
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

/*
|--------------------------------------------------------------------------
| To get a row count
|--------------------------------------------------------------------------
*/
    public function rowCount()
    {
        return $this->stmt->rowCount();
    }
}

