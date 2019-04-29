<?php 
class Notification
{
    private $conn;
    private $table = "notification";
    public $id_notification;
    public $date;
    public $day;
    public $content;
    public $category;
    

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function get()
    {
        $query = "SELECT *, DAYNAME(date) as day FROM notification ORDER BY category DESC, date DESC";

        $result = $this->conn->prepare($query);
        $result->execute();

        return $result;
    }
}