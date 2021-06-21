<?php
    $db = new mysqli('localhost', 'root', 'pw', 'db');
    if($db->connect_errno) {
        echo 'Could not connection: '. $db->connect_error;
        exit;
    }

    $post_id = $db->real_escape_string($_POST['id']);
    $result = $db->query("SELECT p.title, p.content, p.author_id, p.created, u.nickname from post AS p JOIN user AS u ON p.author_id = u.id where p.id=".$post_id.";");
    $row = $result->fetch_array();
    if(empty($row)){
        error_log('post: no post matched on post id');
        exit;
    } else {
        header('Content-type: application/json');
        header('Access-Control-Allow-Origin: *');
        $result_arr = array("title" => $row['title'], "content" => $row['content'], "author_id" => $row['author_id'], "created" => $row['created'], "nickname" => $row['nickname']);
        echo json_encode($result_arr);
    }
    $db->close();
?>