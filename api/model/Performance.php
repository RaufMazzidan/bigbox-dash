<?php 
class Performance
{
    private $conn;
    private $table = "performance";
    public $day;
    public $date;
    public $target;
    public $work;
    public $achievement;
    public $over;
    public $dayname;
    

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function get()
    {
        $query = "SELECT * FROM " . $this->table;

        $result = $this->conn->prepare($query);
        $result->execute();

        return $result;
    }
    public function getDaily()
    {
        $query = "SELECT * FROM " . $this->table;
        $query .= " WHERE DATE(date) = CURDATE()";

        $result = $this->conn->prepare($query);
        $result->execute();

        return $result;
    }
    public function getBetween($start, $end)
    {
        // $query = "SELECT * FROM " . $this->table_name ." WHERE day BETWEEN '".$start."' AND '".$end."';";
        $query = "SELECT * FROM performance WHERE day BETWEEN ".$start." AND ".$end;

        $result = $this->conn->prepare($query);
        $result->execute();

        return $result;
    }

}