<?php
require_once 'Database.php';

class Helper
{
    private $arguments;
    /**
     * @var Database
     */
    private $DB;

    public function __construct()
    {
        $this->DB = new Database();
    }
    public function setArguments($arguments)
    {
        $this->arguments = $arguments;
        $this->init();
    }

    private function init()
    {
        $this->checkArgs();
        $this->checkArgsInt();
        $this->storeToDB();
        $this->getLastFiveRows();
    }

    private function checkArgs()
    {
        if (empty($this->arguments[1]) || empty($this->arguments[2])){
            exit('No Params Sent!');
        }
    }

    private function checkArgsInt()
    {
        if (!is_int((int) $this->arguments[1]) && !is_int((int) $this->arguments[1])){
            exit('Params Must be integers!');
        }
    }

    /**
     * @return float|int
     */
    private function getAverage()
    {
        return ((int) $this->arguments[1] + (int) $this->arguments[2]) / 2;
    }

    private function getArea()
    {
        return ((int) $this->arguments[1] * (int) $this->arguments[2]);

    }

    private function getSquared()
    {
        return pow($this->getArea(), 2);
    }

    private function storeToDB()
    {
        try {
            $this->DB->insert((int) $this->arguments[1], (int) $this->arguments[2], $this->getAverage(), $this->getArea(), $this->getSquared());
            // exit('Insert into DB');
        }catch (Exception $e){
            exit($e->getMessage());
        }
    }

    private function getLastFiveRows()
    {
        try {
            $rows = $this->DB->getLastFiveRows();
            foreach($rows as $key=>$row){
                echo $key." => ID: ".$row['id'] . " First Number: ".$row['first_number']. " Second Number: ".$row['second_number']. " Average: ".$row['average']. " Area: ".$row['area']. " Squared: ".$row['squared']."\n";
            }
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function showRecordsAsHtml()
    {
        try {
            return $this->DB->getLastFiveRows();
        }
        catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
