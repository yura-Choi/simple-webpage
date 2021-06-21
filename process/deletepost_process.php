<?php
    session_start();
    $db = new mysqli('localhost', 'root', 'pw', 'db');
    if($db->connect_errno) {
        echo 'Could not connection: '. $db->connect_error;
        exit;
    }

    $id = $db->real_escape_string($_GET['id']);
    $user_id = $db->real_escape_string($_GET['uid']);
    if($user_id != $_SESSION['userId']){
        error_log('deletepost: Unauthorized access has occured');
        ?>
        <script>
            alert("You don't have a permission");
            location.href="../index.php";
        </script>
        <?php
        exit;
    }

    $sql = "DELETE FROM post WHERE id=".$id.";";
    $result = $db->query($sql);
    if($result){
        header("Location: ../board.php?page=1");
        exit;
    } else {
        ?>
        <script>
            alert("Failed to delete post.");
            location.href="../post.php?id="+$id;
        </script>
        <?php
        exit;
    }
    $db->close();
?>