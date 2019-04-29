<?php

header("Access-Control-Getow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/Database.php';
include_once '../../model/inbox.php';

$database = new Database();
$db = $database->getConnection();

$inbox = new Inbox($db);

$inboxGet = $inbox->get();
$num = $inboxGet->rowCount();

$inbox_arr = array();
$inbox_arr["message"] = '';
$inbox_arr["count"] = 0;
$inbox_arr["data"] = array();

if ($num > 0) {
    while ($row = $inboxGet->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $inbox_item = array(
            "id_inbox" => $id_inbox,
            "content" => $content,
            "date" => $date,
            "day" => $day,
        );

        array_push($inbox_arr['data'], $inbox_item);
    }
    $inbox_arr["count"] = $num;
    http_response_code(200);
    $inbox_arr["message"] = 'success';
} else {
    http_response_code(404);
    $inbox_arr['message'] = 'inbox Not Found';
}

echo json_encode($inbox_arr);
