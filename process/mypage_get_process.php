<?php
    $db = new mysqli('localhost', 'root', 'pw', 'db');
    if($db->connect_errno) {
        echo 'Could not connection: '. $db->connect_error;
        exit;
    }
    $userId = $db->real_escape_string($_POST['userId']);
    if(empty($userId)){
        error_log("mypage_get: empty data of userId");
        exit;
    }
    $sql = "SELECT user_id, nickname FROM user WHERE id=".$userId.";";
    $result = $db->query($sql);
    $row = $result->fetch_array();
    if(empty($row)){
        error_log("mypage_get: no data matched on uesr id");
        exit;
    } else {
        header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
        $result_arr = array('user_id' => $row['user_id'], 'nickname' => $row['nickname']);
        echo json_encode($result_arr);
    }
    $db->close();
?>