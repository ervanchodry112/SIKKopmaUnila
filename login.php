<?php
session_start();
require 'include/functions.php';

if (isset($_SESSION['login'])) {
    if ($_SESSION['role'] == 3 || $_SESSION['role'] == 2) {
        header('Location: index.php');
    }
    exit;
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['pass'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_array($result);
        if (password_verify($password, $row['password'])) {

            $_SESSION['login'] = true;
            $_SESSION['role'] = $row['permission'];

            header('Location: index.php');
            exit;
        }
    }

    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="asset/css/bootstrap.css" />
    <link rel="stylesheet" href="asset/css/style.css" />
    <link rel="shortcut icon" href="asset/img/logo-kopma-unila.png" />
</head>

<body>
    <div class="container my-5 shadow" id="login-form" style="border: 1px solid rgb(0,0,0,.1); border-radius: 15px;">
        <h1 class="text-center my-3">Login</h1>
        <hr class="w-75 mx-auto">

        <form action="" method="post">
            <div class="row w-75 mx-auto mb-3">
                <div class="col">
                    <label for="username">Username</label>
                    <input class="form-control" type="text" name="username" id="username" placeholder="username" autocomplete="off">
                </div>
            </div>
            <div class="row w-75 mx-auto mb-3">
                <div class="col">
                    <label for="pass">Password</label>
                    <input class="form-control" type="password" name="pass" id="pass" placeholder="password">
                </div>
            </div>
            <?php if (isset($error)) { ?>
                <div class="row w-75 mx-auto mb-3">
                    <div class="col">
                        <div class="alert alert-danger" role="alert">
                            Username/Password salah
                        </div>
                    </div>
                </div>
            <?php } ?>
            <div class="row w-75 mx-auto mb-4">
                <div class="col">
                    <input class="btn btn-primary w-100" type="submit" value="login" name="login">
                </div>
            </div>
        </form>
    </div>


    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="asset/js/bootstrap.js"></script>
    <script src="asset/js/popper.min.js"></script>
</body>

</html>