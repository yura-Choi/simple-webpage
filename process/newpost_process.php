<?php
    session_start();
    $db = new mysqli('localhost', 'root', 'pw', 'db');
    if($db->connect_errno) {
        echo 'Could not connection: '. $db->connect_error;
        exit;
    }

    $id = $_SESSION['userId'];
    $title = $db->real_escape_string($_POST['title']);
    if(empty($title)){
        error_log('newpost: empty data of title');
        exit;
    }
    $content = $db->real_escape_string($_POST['content']);
    if(empty($content)){
        error_log('newpost: empty data of content');
        exit;
    }

    $sql = "INSERT INTO post(title, content, author_id, created) VALUES('".$title."', '".$content."', ".$id.", NOW());";
    $result = $db->query($sql);
    if($result){
        header("Location: ../board.php?page=1");
        exit;
    } else {
        ?>
        <script>
            alert("Failed to post. Try again");
            location.href="../newpost.php";
        </script>
        <?php
        exit;
    }
    
    $db->close();
?>