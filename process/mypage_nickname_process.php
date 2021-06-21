<?php
    $db = new mysqli('localhost', 'root', 'pw', "db");
    if($db->connect_errno) {
        echo 'Could not connection: '. $db->connect_error;
        exit;
    }
    $nickname = $db->real_escape_string($_POST['nickname']);
    $userId = $db->real_escape_string($_POST['userId']);
    $result = $db->query("SELECT id FROM user WHERE nickname='".$nickname."';");
    $row = $result->fetch_array();
    if(empty($row)){
        echo 'OK';
    } else {
        while(1){
            if($row['id'] == $userId){
                echo 'OK';
                break;
            }
            $row = $result->fetch_array();
            if(empty($row)){
                echo 'duplicated';
                break;
            }
        }
    }
    $db->close();
?>