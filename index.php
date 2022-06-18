<?php
session_start();
require 'include/functions.php';
if (!isset($_SESSION['login'])) {
     header('Location: login.php');
     exit;
}

if (isset($_GET['page'])) {
     $page = $_GET['page'];
} else {
     $page = 'data_anggota';
}

$query = "SELECT a.npm, a.nama as nama, a.nomor_anggota, b.simpanan_pokok, b.simpanan_wajib, c.total_poin
          FROM anggota a, simpanan b, poin c WHERE a.npm = '2017051001'
          AND b.npm = '2017051001' AND c.npm = '2017051001'";
$data = query($query);
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

                              <ul class="dropdown-menu" style="left: -100px;" aria-labelledby="navbarDropdown">
                                   <?php if ($_SESSION['role'] == 1) { ?>
                                        <li><a class="dropdown-item" href="?page=edit_biodata&npm=2017051001">Edit Profile</a></li>
                                   <?php } ?>
                                   <li><a class="dropdown-item" href="logout.php">LogOut</a></li>
                              </ul>
                         </li>
                    </ul>
               </div>
          </div>
     </nav>
     <!-- Navbar -->

     <?php if ($_SESSION['role'] == 1) { ?>
          <!-- vvv Dashboard untuk anggota vvv -->
          <main style="margin-left: 0;">

               <?php
               switch ($page) {
                    case 'kode_pembayaran':
                         include 'kode_pembayaran.php';
                         break;
                    case 'success':
                         include 'pembayaran_sukses.php';
                         break;
                    case 'riwayat':
                         include 'riwayat_transaksi.php';
                         break;
                    case 'edit_biodata':
                         include 'edit_biodata.php';
                         break;
                    default:
                         include 'halaman_anggota.php';
                         break;
               }

               ?>

          </main>
          <!-- ^^^ Dashboard Untuk Anggota ^^^ -->

     <?php } else { ?>
          <!-- Offcanvas -->
          <div class=" offcanvas offcanvas-start sidebar-nav bg-dark text-white" data-bs-scroll="true" data-bs-backdrop="true" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
               <div class="offcanvas-body p-0">
                    <nav class="navbar-dark">
                         <ul class="navbar-nav">
                              <li>
                                   <div class="text-muted small fw-bold text-uppercase px-3">
                                        psda
                                   </div>
                              </li>
                              <!-- <li>
                        <a href="index.php" class="nav-link px-3 d-flex">
                            <span class="me-2">
                                <ion-icon style="font-size: 22px;" name="people"></ion-icon>
                            </span>
                            <spa>Pendaftaran Anggota</span>
                        </a>
                    </li> -->
                              <li>
                                   <a href="?page=data_anggota" class="nav-link px-3 d-flex">
                                        <span class="me-2">
                                             <ion-icon style="font-size: 22px;" name="people"></ion-icon>
                                        </span>
                                        <span>Data Anggota</span>
                                   </a>
                              </li>
                              <li>
                                   <a href="?page=data_simpanan" class="nav-link px-3 d-flex">
                                        <span class="me-2">
                                             <ion-icon style="font-size: 22px;" name="people"></ion-icon>
                                        </span>
                                        <span>Data Simpanan</span>
                                   </a>
                              </li>
                              <li>
                                   <a href="?page=data_poin" class="nav-link px-3 d-flex">
                                        <span class="me-2">
                                             <ion-icon style="font-size: 22px;" name="people"></ion-icon>
                                        </span>
                                        <span>Data Poin</span>
                                   </a>
                              </li>
                              <li>
                                   <a href="?page=data_produk" class="nav-link px-3 d-flex">
                                        <span class="me-2">
                                             <ion-icon style="font-size: 22px;" name="people"></ion-icon>
                                        </span>
                                        <span>Data Produk</span>
                                   </a>
                              </li>
                              <li class="my-4">
                                   <hr class="dropdown-divider">
                              </li>
                              <?php if ($_SESSION['role'] == 3) { ?>
                                   <li>
                                        <a href="?page=akun" class="nav-link px-3 d-flex">
                                             <span class="me-2">
                                                  <ion-icon style="font-size: 22px;" name="people"></ion-icon>
                                             </span>
                                             <span>Akun</span>
                                        </a>
                                   </li>
                              <?php } ?>
                         </ul>
                    </nav>
               </div>
          </div>
          <!-- Offcanvas -->

          <!-- Main Content -->
          <main>
               <?php
               switch ($page) {
                    case 'data_anggota':
                         include 'data_anggota.php';
                         break;
                    case 'data_simpanan':
                         include 'data_simpanan.php';
                         break;
                    case 'data_poin':
                         include 'data_poin.php';
                         break;
                    case 'data_produk':
                         include 'data_produk.php';
                         break;
                    case 'akun':
                         include 'akun.php';
                         break;
               }
               ?>
          </main>
     <?php } ?>

     <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
     <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
     <script src="asset/js/bootstrap.js"></script>
     <script src="asset/js/popper.min.js"></script>
     <script src="include/jsfunctions.js"></script>
</body>

</html>