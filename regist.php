<?php
session_start();
require 'include/functions.php';

if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['submit'])) {
    if (regist($_POST) > 0) {
        echo "<script>
        alert('User Berhasil ditambahkan');
        </script>";
    } else {
        echo "<script>
        alert('User Gagal ditambahkan" . mysqli_error($conn) . "');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User</title>
    <link rel="stylesheet" href="asset/css/bootstrap.css" />
    <link rel="stylesheet" href="asset/css/style.css" />
    <link rel="shortcut icon" href="asset/img/logo-kopma-unila.png" />
</head>

<body>
    <h1 class="d-flex justify-content-center mt-3">Tambah User Admin</h1>
    <hr>
    <a href="index.php?page=akun">Back</a>

    <form action="" method="post">
        <ul>
            <li class="row">
                <div class="col-2">
                    <label for="username">Username</label>
                </div>
                <div class="col-2">
                    <input type="text" name="username" id="username" autocomplete="off">
                </div>
            </li>
            <li class="row">
                <div class="col-2">
                    <label for="pass">Password</label>
                </div>
                <div class="col-2">
                    <input type="password" name="pass" id="pass">
                </div>
            </li>
            <li class="row">
                <div class="col-2">
                    <label for="confirm">Re-type Password</label>
                </div>
                <div class="col-2">
                    <input type="password" name="confirm" id="confirm">
                </div>
            </li>
            <li class="row">
                <div class="col-2">
                    <label for="role">Role</label>
                </div>
                <div class="col-2">
                    <select name="role" id="role">
                        <option selected>--Pilih Role--</option>
                        <option value=1>Anggota</option>
                        <option value=2>Pengurus</option>
                        <option value=3>Admin</option>
                    </select>
                </div>
            </li>
            <li class="row">
                <div class="col-4">
                    <input class=" w-100 btn btn-primary" type="submit" value="submit" name="submit">
                </div>
            </li>
        </ul>
    </form>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="asset/js/bootstrap.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="include/jsfunctions.js"></script>
</body>

</html>