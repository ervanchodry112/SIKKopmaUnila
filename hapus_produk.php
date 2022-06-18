<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}
require 'include/functions.php';
$id = $_GET['id'];
$query = "DELETE FROM produk WHERE id_produk = '$id';";
mysqli_query($conn, $query);


if (mysqli_affected_rows($conn) > 0) {
    echo "<script>
        alert('Data Berhasil dihapus');
        location.href = 'index.php?page=data_produk';
    </script>";
} else {
    echo "<script>
        alert('Terjadi Kesalahan');
    </script>";
}
