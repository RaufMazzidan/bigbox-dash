<?php 
class Inbox
{
    private $conn;
    private $table = "inbox";
    public $id_inbox;
    public $date;
    public $day;
    public $content;
    

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function get()
    {
        $query = "SELECT *, DAYNAME(date) as day FROM " . $this->table;

        $result = $this->conn->prepare($query);
        $result->execute();

        return $result;
    }
}