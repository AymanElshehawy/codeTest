<?php

class Database
{
    /**
     * @var PDO
     */
    private $pdo;

    public function __construct()
    {
        $this->connectToDB();
//        $this->setDatabase();
    }

    public function connectToDB()
    {
        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', 'root');
//        define('DB_NAME', 'codeTest');

        try{
            $pdo = new PDO("mysql:host=" . DB_SERVER, DB_USERNAME, DB_PASSWORD);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;

        } catch(PDOException $e){
            die("ERROR: Could not connect. " . $e->getMessage());
        }
    }

    public function setDatabase()
    {
        try {
            $sql = "CREATE DATABASE codeTest";
            $this->pdo->exec($sql);
            echo "Database created successfully";
        }
        catch(PDOException $e)
        {
            exit($e->getMessage());
        }
    }
}