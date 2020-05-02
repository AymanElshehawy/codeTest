<?php
require_once 'Database.php';

class Helper
{
    private $arguments;
    /**
     * @var Database
     */
    private $DB;

    public function __construct($arguments)
    {
        $this->arguments = $arguments;
//        $this->checkArgs();
//        $this->checkArgs();
        $this->storeToDB();
    }

    public function checkArgs()
    {
        if (empty($this->arguments[1]) || empty($this->arguments[2])){
            exit('No Params Sent!');
        }
    }

    public function checkArgsInt()
    {
        if (!is_int((int) $this->arguments[1]) && !is_int((int) $this->arguments[1])){
            exit('Params Must be integers!');
        }
    }

    /**
     * @return float|int
     */
    public function getAverage()
    {
        return ((int) $this->arguments[1] + (int) $this->arguments[2]) / 2;
    }

    public function getArea()
    {
        return ((int) $this->arguments[1] * (int) $this->arguments[2]);

    }

    public function getSquared()
    {
        return pow($this->getArea(), 2);
    }

    public function storeToDB()
    {
        try {
            $this->DB = new Database();
//            var_dump($this->DB);
        }catch (Exception $e){
            exit($e->getMessage());
        }
    }
}