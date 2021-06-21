<?php
    session_start();
    $db = new mysqli('localhost', 'root', 'pw', 'db');
    if($db->connect_errno) {
        echo 'Could not connection: '. $db->connect_error;
        exit;
    }
    $userId = $_SESSION['userId'];
    $user_id = $db->real_escape_string($_POST['id']);
    if(empty($user_id)){
        error_log("mypage_set: empty data of user id");
        exit;
    }
    $user_pw = $db->real_escape_string($_POST['pw']);
    if(empty($user_pw)){
        error_log("mypage_set: empty data of user pw");
        exit;
    }
    $nickname = $db->real_escape_string($_POST['nickname']);
    if(empty($nickname)){
        error_log("mypage_set: empty data of user nickname");
        exit;
    }
    
    $hashed_pw = hash('sha256', $user_pw);
    $sql = "UPDATE user SET user_id='".$user_id."', user_pw='".$hashed_pw."', nickname='".$nickname."' WHERE id=".$userId.";";
    $result = $db->query($sql);
    if($result){
        ?>
        <script>
            alert("Updated user info");
            location.href="../mypage.php";
        </script>
        <?php
    } else {
        error_log("mypage_set: Failed to update user info");
        ?>
        <script>
            alert("Failed to update user info");
            location.href="../mypage.php";
        </script>
        <?php
    }
    $db->close();
?>