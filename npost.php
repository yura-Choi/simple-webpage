<?php
  session_start();
  if(!isset($_SESSION['isLogin'])){
    ?>
    <script>
      alert('Only for members. Login first.');
      location.href="./login.php";
    </script>
    <?php
    exit;
  }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>sample web application</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/">Homepage</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" href="board.php?page=1">Board</a></li>
                        <li class="nav-item"><a class="nav-link" href="./process/logout_process.php">Logout</a></li>
                        <li class="nav-item" id="mypage"><a class="nav-link" href="">MyPage</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container">
            <div class="text-center mt-5">
                <h3>New Post</h3>
                <hr class="mb-3" style="border-top: 1px solid deemgrey;">
            </div>
            <form method="post" action="./process/newpost_process.php">
                <div class="mb-3 mt-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Content</label>
                    <textarea class="form-control" id="content" name="content" rows="15" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label" id="created" style="display:none;"></label>
                </div>
                <input type="text" id="id" name="id" style="display:none;" readonly>
                <button type="submit" class="btn btn-outline-dark btn-sm mb-5" id="submit">POST</button></div></div>
            </form>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script>
        var url = new URL(window.location.href);
        var id = url.searchParams.get('id');
        if(id != null){
            document.getElementById('id').value = id;
            console.log(document.getElementById('id').value);
            document.getElementById('created').style.display = "inline";
            document.getElementById('submit').innerHTML = "MODIFY";
            document.getElementsByTagName('h3')[0].innerHTML = "MODIFY";
            document.getElementsByTagName('form')[0].setAttribute('action', './process/modifypost_process.php');
            getModifyContent(id, (author_id) => {
                if(author_id != <?php echo $_SESSION['userId'] ?>){
                    alert("You don't have a permission");
                    location.href="board.php?page=1";
                }
            });
        }
    </script>
</html>
