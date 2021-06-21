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
        <style>
          .list:hover {
            cursor: pointer;
            background-color: #f7f7f7;
          }
        </style>
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="/">Homepage</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" href="">Board</a></li>
                        <li class="nav-item"><a class="nav-link" href="./process/logout_process.php">Logout</a></li>
                        <li class="nav-item" id="mypage"><a class="nav-link" href="mypage.php">MyPage</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container">
            <div class="text-center mt-5">
                <h3>BOARD</h3>
                <div class="row mt-3"><div class="col-1"><button type="button" class="btn btn-outline-dark btn-sm" onClick="location.href='/npost.php'">WRITE</button></div></div>
                <div class="row mt-2 py-2" style="border-top: 1px solid lightgray; border-bottom: 1px solid dimgray;">
                  <div class="col-1">no.</div>
                  <div class="col-6">title</div>
                  <div class="col-3">author</div>
                  <div class="col-2">date</div>
                </div>
                <?php
                  $db = new mysqli('localhost', 'root', 'pw', 'db');
                  if(!$db){
                    echo 'Could not connection: '.$db->connect_error;
                    exit;
                  }
                  $page = $_GET['page'];
                  $result = $db->query('SELECT p.id, p.title, p.content, u.nickname, p.created from post AS p JOIN user AS u ON p.author_id=u.id ORDER BY created DESC LIMIT 11');

                  $i = 1;
                  $post = '';
                  while ($i <= 10 && $post = $result->fetch_array()){
                    echo "<div class='row py-2 list' style='border-bottom: 1px solid lightgrey;' onclick=showPost(".$post['id'].")>
                      <div class='col-1'>".$i."</div>
                      <div class='col-6'>".$post['title']."</div>
                      <div class='col-3'>".$post['nickname']."</div>
                      <div class='col-2'>".substr($post['created'], 0, 10)."</div>
                    </div>";
                    $i += 1;
                  }
                  $db->close();
                ?>
            </div>

            <nav class="mt-5" aria-label="Page navigation example">
                <ul class="pagination pagination-sm justify-content-center">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" aria-label="Previous">
                      <span aria-hidden="true">&laquo;</span>
                    </a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                      <span aria-hidden="true">&raquo;</span>
                    </a>
                  </li>
                </ul>
              </nav>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</html>
