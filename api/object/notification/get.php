<?php

header("Access-Control-Getow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../../config/Database.php';
include_once '../../model/Notification.php';

$database = new Database();
$db = $database->getConnection();

$notification = new Notification($db);

$notificationGet = $notification->get();
$num = $notificationGet->rowCount();

$notification_arr = array();
$notification_arr["message"] = '';
$notification_arr["count"] = 0;
$notification_arr["data"] = array();

if ($num > 0) {
    while ($row = $notificationGet->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $notification_item = array(
            "id_notification" => $id_notification,
            "content" => $content,
            "date" => $date,
            "day" => $day,
            "category" => $category
        );

        array_push($notification_arr['data'], $notification_item);
    }
    $notification_arr["count"] = $num;
    http_response_code(200);
    $notification_arr["message"] = 'success';
} else {
    http_response_code(404);
    $notification_arr['message'] = 'Notification Not Found';
}

echo json_encode($notification_arr);
