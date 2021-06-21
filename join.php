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
                        <li class="nav-item"><a class="nav-link" href="login.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container">            
            <div class="my-5 mx-5">
                <h3 class="col-1 mx-auto">JOIN</h3>
                <form class="input-form" name="joinForm" method="post" action="./process/join_process.php">
                <div class="row">
                    <div class="col-8">
                        <div class="form-floating mb-3 mt-4">
                            <input type="email" class="form-control" id="id" name="id" placeholder="name@example.com" required>
                            <label>Email address</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="pw" name="pw" placeholder="password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9]).{8,15}$" required>
                            <label>Password</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <p style="font-size: small;">
                            Password must be 8-15 letters included least 1 capital letter, 1 small letter, 1 number.
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="pw_confirm" onblur="checkPW(join_checkCondition)" placeholder="Comfirm Password" required>
                            <label>Comfirm Password</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <p class="mt-3" id="messagePW" style="visibility: hidden; font-size: small;"></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="nickname" name="nickname" placeholder="Nickname" required>
                            <label>Nickname</label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="button" class="btn btn-secondary mt-3" id="nicknameValid" onclick="join_checkNickname()">Check nickname</button>
                        <button type="button" class="btn btn-secondary mt-3" id="reset" onclick="resetNickname(join_checkCondition)" style="display:none;">reset</button>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark" id="join" disabled>join</button>
                </form>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
</html>
