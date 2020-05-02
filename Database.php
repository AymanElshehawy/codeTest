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
        $this->setTable();
    }

    public function connectToDB()
    {
        define('DB_SERVER', 'localhost');
        define('DB_USERNAME', 'root');
        define('DB_PASSWORD', '');
        define('DB_NAME', 'codeTest');

        try{
            $pdo = new PDO("mysql:host=" . DB_SERVER. ";dbname=".DB_NAME, DB_USERNAME, DB_PASSWORD);

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo = $pdo;

        } catch(PDOException $e){
            die("ERROR: Could not connect. " . $e->getMessage());
        }
    }

    private function setTable()
    {
        try{
            $sql = "CREATE TABLE IF NOT EXISTS  `codetest`.`items` ( `id` INT NOT NULL AUTO_INCREMENT , `first_number` INT NOT NULL , `second_number` INT NOT NULL , `average` FLOAT NOT NULL , `area` FLOAT NOT NULL , `squared` FLOAT NOT NULL , PRIMARY KEY (`id`))";
            $this->pdo->exec($sql);
        }catch (Exception $e){
            exit('Error creating table: '.$e->getMessage());
        }
    }

    public function insert($first_number, $second_number, $average, $area, $squared)
    {
        try{
            $sql = "INSERT INTO `items` (first_number, second_number, average, area,squared) VALUES ($first_number, $second_number, $average, $area, $squared)";
            $this->pdo->exec($sql);
            return true;
        }catch (Exception $e){
            exit('Error creating table: '.$e->getMessage());
        }
    }

    public function getLastFiveRows()
    {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM items ORDER BY id desc LIMIT 5");
            $stmt->execute();
            
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            return $stmt->fetchAll();
        }
        catch(PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
}
