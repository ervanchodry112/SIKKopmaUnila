<?php
session_start();
require 'include/functions.php';
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}
if (isset($_POST['submit'])) {
    if (addAnggota($_POST)) {
        echo "<script>
        alert('Data Berhasil ditambahkan');
    </script>";
        header('Location: index.php?page=data_anggota');
        exit;
    } else {
        echo "<script>
        alert('Data Gagal ditambahkan');
    </script>";
    }
}


$query_fakultas = "SELECT * FROM fakultas";
$fakultas = query($query_fakultas);

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
                Tambah Data Anggota
            </div>
        </div>
        <hr>
        <div class="row mb-3">
            <a href="index.php" style="color: black;" class="align-baseline">
                <ion-icon name="arrow-back-outline"></ion-icon>
                <span>Back</span>
            </a>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label for="npm" class="ms-2">NPM</label>
                <div class="form-floating-sm text-muted">
                    <input type="number" class="form-control" name="npm" id="npm" placeholder="NPM">
                </div>
            </div>
            <div class="col-6">
                <label for="npm" class="ms-2">Nama</label>
                <div class="form-floating-sm text-muted">
                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label for="nomor_anggota" class="ms-2">Nomor Anggota</label>
                <div class="form-floating-sm text-muted">
                    <input type="text" class="form-control" name="nomor_anggota" id="nomor_anggota" placeholder="Nomor Anggota">
                </div>
            </div>
            <div class="col-6">
                <label for="email" class="ms-2">Email</label>
                <div class="form-floating-sm text-muted">
                    <input type="email" class="form-control" name="email" id="email" placeholder="example@email.com">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-sm-6">
                <label for="fakultas" style="font-size: 17px; margin-bottom: 5px">Fakultas</label>
                <div class="form-floating-sm text-muted">
                    <select class="form-select" name="fakultas" id="fakultas" aria-label="form-select" required>
                        <option selected>-- Pilih Fakultas --</option>
                        <?php foreach ($fakultas as $data) { ?>
                            <option value="<?= $data["id_fakultas"] ?>"><?= $data["nama_fakultas"] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-6">
                <label for="jurusan" style="font-size: 17px; margin-bottom: 5px">Jurusan</label>
                <div class="form-floating-sm text-muted">
                    <select class="form-select" name="jurusan" id="jurusan" aria-label="form-select" required>
                        <option selected>-- Pilih Jurusan --</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label for="nomor_hp" class="ms-2">Nomor Handphone</label>
                <div class="form-floating-sm text-muted">
                    <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" placeholder="Nomor Handphone">
                </div>
            </div>
            <div class="col-6">
                <label for="poin" class="ms-2">Poin</label>
                <div class="form-floating-sm text-muted input-group">
                    <input type="text" class="form-control" name="poin" id="poin" placeholder="Poin">
                    <span class="input-group-text">Poin</span>
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-6">
                <label for="simpanan_pokok" class="ms-2">Simpanan Pokok</label>
                <div class="form-floating-sm text-muted input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="text" class="form-control" name="simpanan_pokok" id="simpanan_pokok" placeholder="Simpanan Pokok">
                </div>
            </div>
            <div class="col-6">
                <label for="simpanan-wajib" class="ms-2">Simpanan Wajib</label>
                <div class="form-floating-sm text-muted input-group">
                    <span class="input-group-text">Rp</span>
                    <input type="text" class="form-control" name="simpanan_wajib" id="simpanan_wajib" placeholder="Simpanan Wajib">
                </div>
            </div>
        </div>
        <div class="row">
            <input type="submit" value="submit" name="submit" class="btn btn-primary mx-2">
        </div>

    </form>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="asset/js/bootstrap.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="include/jsfunctions.js"></script>
</body>

</html>