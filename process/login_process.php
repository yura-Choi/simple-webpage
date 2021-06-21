<?php
    $db = new mysqli('localhost', 'root', 'pw', 'db');
    if($db->connect_errno) {
        echo 'Could not connection: '. $db->connect_error;
        exit;
    }
    $id = $_POST['id'];
    if(empty($id)){
        error_log('login: empty data of id');
        exit;
    }
    $pw = $_POST['pw'];
    if(empty($pw)){
        error_log('login: empty data of pw');
        exit;
    }

    $id = $db->real_escape_string($id);
    $pw = $db->real_escape_string($pw);
    $hashed_pw = hash("sha256", $pw);
    $sql = "SELECT id FROM user WHERE user_id='".$id."' AND user_pw='".$hashed_pw."';";
    $result = $db -> query($sql);
    $row = $result -> fetch_array();
    if(!empty($row)){
        session_start();
        $_SESSION['isLogin'] = true;
        $_SESSION['userId'] = $row['id'];
        ?>
        <script>
            alert("Success to login!");
            location.href="../index.php";
        </script>
        <?php
        exit;
    } else {
        ?>
        <script>
            alert("Incorrect email or password");
            location.href="../login.php";
        </script>
        <?php
        exit;
    }
    $db->close();
?>