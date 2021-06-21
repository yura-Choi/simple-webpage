<?php
    $db = new mysqli('localhost', 'root', 'pw', 'db');
    if($db->connect_errno) {
        echo 'Could not connection: '. $db->connect_error;
        exit;
    }
    $userId = $db->real_escape_string($_POST['userId']);
    $sql = "DELETE FROM user WHERE id=".$userId.";";
    $result = $db->query($sql);
    if($result){
        session_start();
        session_destroy();
        echo 'OK';
    } else {
        error_log('mypage_withdrawal: Failed to delete user info');
        echo 'failed';
    }
    $db->close();
?>