<?php
    $db = new mysqli('localhost', 'root', 'pw', 'db');
    if($db->connect_errno) {
        echo 'Could not connection: '. $db->connect_error;
        exit;
    }
    $id = $db->real_escape_string($_POST['id']);
    $title = $db->real_escape_string($_POST['title']);
    if(empty($title)){
        error_log('modifypost: empty data of title');
        exit;
    }
    $content = $db->real_escape_string($_POST['content']);
    if(empty($content)){
        error_log('modifypost: empty data of content');
        exit;
    }
    $sql = "UPDATE post SET title='".$title."', content='".$content."' WHERE id=".$id.";";
    $result = $db->query($sql);
    if($result){
        header("Location: ../post.php?id=".$id);
        exit;
    } else {
        ?>
        <script>
            alert("Failed to modify post.");
            location.href="../npost.php?id="+<?php echo $id ?>;
        </script>
        <?php
        exit;
    }
    $db->close();
?>