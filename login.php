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
                        <li class="nav-item"><a class="nav-link active" href="">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container-md">
            <div class="my-5 mx-5">
                <h3 class="col-1 mx-auto">LOGIN</h3>
                <form class="input-form col-5 mx-auto" method="post" action="./process/login_process.php">
                    <div class="form-floating mb-3 mt-4">
                        <input type="email" class="form-control" id="id" name="id" placeholder="name@example.com" required>
                        <label>Email address</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="pw" name="pw" placeholder="password" required>
                        <label>Password</label>
                    </div>
                    <button type="submit" class="btn btn-dark" id="login">login</button>
                    <button type="button" class="btn btn-secondary" id="join" onClick="location.href='/join.php'">join</button>
                </form>
                <!-- Find PW -->
                <div class="col-5 mt-3 mx-auto"><a href="#" id="findPW" style="color:rgb(105, 105, 105);" data-bs-toggle="modal" data-bs-target="#pwModal" data-bs-whatever="@getbootstrap" onclick="getContact()">Forget your password?</a></div>
                <div class="modal fade" id="pwModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">SORRY!</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="user-email" class="col-form-label">If you forget password, Please call manager:</label>
                                <input type="email" class="form-control" id="contact" readonly>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">OK</button>
                        </div>
                        </form>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</html>
