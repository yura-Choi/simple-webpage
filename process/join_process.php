<?php
    $db = new mysqli('localhost', 'root', 'pw', 'db');
    if($db->connect_errno) {
        echo 'Could not connection: '. $db->connect_error;
        exit;
    }
    $id = $_POST['id'];
    if(empty($id)){
        error_log('join:empty data of id');
        exit;
    }
    $pw = $_POST['pw'];
    if(empty($pw)){
        error_log('join:empty data of pw');
        exit;
    }
    $nickname = $_POST['nickname'];
    if(empty($nickname)){
        error_log('join:empty data of nickname');
        exit;
    }

    $id = $db->real_escape_string($id);
    $pw = $db->real_escape_string($pw);
    $hashed_pw = hash("sha256", $pw);
    $nickname = $db->real_escape_string($nickname);

    $sql = "INSERT INTO user (user_id, user_pw, nickname) VALUES ('".$id."', '".$hashed_pw."', '".$nickname."');";
    $result = $db->query($sql);
    if($result){
        header("Location: ../join_success.php");
        exit;
    } else {
        ?> <script>
            alert("Failed to join. Please retry.");
            location.href="../join.php";
        </script> <?php
    }
    $db->close();
?>