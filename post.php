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
                        <li class="nav-item"><a class="nav-link" href="mypage.php">MyPage</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container">
            <div class="text-center mt-5">
                <h3 id="title">BOARD</h3>
                <div class="text-end" style="color: deemgrey; font-size: 15px;">
                    <span id="author"></span>
                    &nbsp;|&nbsp;
                    <span id="created"></span>
                </div>
                <hr class="mb-2" style="border-top: 1px solid deemgrey;">
            </div>

            <div class="mb-2 text-end" id="user_menu" style="color: deemgrey; font-size: 15px; visibility: hidden;">
                <a class="menu" href="./npost.php?id=">modify</a>
                &nbsp;|&nbsp;
                <a class="menu" href="./process/deletepost_process.php?uid=<?php echo $_SESSION['userId'] ?>&id=">delete</a>
            </div>
            <div class="mb-3 text-center">
                <p id="content"></p>
            </div>
            <div class="row mb-3">
                <div class="col-1"><button type="button" class="btn btn-outline-dark btn-sm" onClick="location.href='./board.php?page=1'">BACK</button></div>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script>
        var url = new URL(window.location.href);
        var id = url.searchParams.get("id");
        getPostContent(id, (author_id) => {
            if(author_id == <?php echo $_SESSION['userId'] ?>){
                document.getElementById('user_menu').style.visibility = 'visible';
            }
            var links = document.getElementsByClassName('menu');
            for(var i = 0; i < links.length; i++){
                links[i].setAttribute('href', links[i].href+id);
            }
        });
    </script>
</html>