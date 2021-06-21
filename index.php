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
                        <li class="nav-item"><a class="nav-link" href="board.php?page=1">Board</a></li>
                        <li class="nav-item"><a class="nav-link" href="login.php" id="login">Login</a></li>
                        <li class="nav-item" id="mypage" style="display:none;"><a class="nav-link" href="mypage.php">MyPage</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container">
            <div class="text-center mt-5">
                <h3>This is SSG web programming assignment</h3>
                <p class="lead" id="msg">To use this page, login first.</p>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</html>
<?php
    session_start();
    if(isset($_SESSION['isLogin'])){
        ?>
        <script>
            document.getElementById("mypage").style.display = 'inline';
            document.getElementById("login").innerText = 'Logout';
            document.getElementById("login").setAttribute('href', './process/logout_process.php');
            document.getElementById("msg").innerText = 'Hi! We were waiting for you.';
        </script>
        <?php
    }
?>