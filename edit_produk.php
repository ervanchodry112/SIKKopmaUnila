<?php
session_start();
require 'include/functions.php';
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}
if (isset($_POST['submit'])) {
    var_dump($_POST);
    if (editProduk($_POST)) {
        echo "<script>
        alert('Data Berhasil ditambahkan');
    </script>";
        header('Location: index.php?page=data_produk');
        exit;
    } else {
        echo "<script>
        alert('Data Gagal ditambahkan');
    </script>";
    }
}

$id = $_GET['id'];
$nama_produk = $_GET['nama'];
$harga_produk = $_GET['harga'];
$stok = $_GET['stok'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="asset/css/bootstrap.css" />
    <link rel="stylesheet" href="asset/css/style.css" />
    <link rel="shortcut icon" href="asset/img/logo-kopma-unila.png" />
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top w-100">
        <div class="container-fluid">
            <!-- Offcanvas Trigerr -->
            <button class="navbar-toggler me-2" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                <span class="navbar-toggler-icon" data-bs-target="#offcanvasExample"></span>
            </button>
            <!-- Offcanvas Trigerr -->
            <a class="navbar-brand d-flex me-auto" href="#">
                <img class="me-2" height="40px" src="asset/img/logo-kopma-unila.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mb-2 mb-lg-0 ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <span>
                                <ion-icon style="font-size: 26px;" name="person-circle-outline"></ion-icon>
                            </span>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="logout.php">LogOut</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

    <!-- Main Content -->
    <form action="" method="POST" class="mx-3" style="margin-top: 75px;">
        <div class="row">
            <div class="h1 text-center mb-4">
                Edit Produk
            </div>
        </div>
        <hr>
        <div class="row mb-3">
            <a href="index.php?page=data_produk" style="color: black;" class="align-baseline">
                <ion-icon name="arrow-back-outline"></ion-icon>
                <span>Back</span>
            </a>
        </div>
        <div class="row mb-3">
            <div class="col-4">
                <label for="nama_produk" class="ms-2">Nama Produk</label>
                <div class="form-floating-sm text-muted">
                    <input type="text" class="form-control" name="nama_produk" id="nama_produk" value=" <?= $nama_produk ?>">
                </div>
            </div>
            <div class="col-4">
                <label for="harga_produk" class="ms-2">Harga Produk</label>
                <div class="form-floating-sm text-muted input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="text" class="form-control" name="harga_produk" id="harga_produk" value="<?= $harga_produk ?>">
                </div>
            </div>
            <div class="col-4">
                <label for="stok" class="ms-2">Stok</label>
                <div class="form-floating-sm text-muted input-group">
                    <input type="text" class="form-control" name="stok" id="stok" value="<?= $stok ?>">
                    <span class="input-group-text">pcs</span>
                </div>
            </div>
            <input type="text" class="form-control d-none" name="id" id="id" value="<?= $id ?>">
        </div>
        <div class="row">
            <div class="col-12">
                <input type="submit" value="SUBMIT" name="submit" class="btn btn-primary w-100">
            </div>
        </div>

    </form>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="asset/js/bootstrap.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="include/jsfunctions.js"></script>
</body>

</html>