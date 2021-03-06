<?php

header("Access-Control-Getow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/Database.php';
include_once '../../model/Performance.php';

if (isset($_GET['s']) && isset($_GET['e'])) {

    $start = $_GET['s'];
    $end = $_GET['e'];
    // $start = 1;
    // $end=6;

    $database = new Database();
    $db = $database->getConnection();

     $performance = new Performance($db);

    $performanceGet = $performance->getBetween($start,$end);
    $num = $performanceGet->rowCount();

    $performance_arr = array();
    $performance_arr["data"] = array();

   if ($num > 0) {
    while ($row = $performanceGet->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $performance_item = array(
            "day" => $day,
            "target" => $target,
            "work" => $work,
            "achievement" => $achievement,
            "over" => $over,
            "dayname" => $dayname
        );

        array_push($performance_arr['data'], $performance_item);
    }
    http_response_code(200);
    // $performance_arr["message"] = 'success';
} else {
    http_response_code(404);
    // $performance_arr['message'] = 'performance Not Found';
}



echo json_encode($performance_arr);
}