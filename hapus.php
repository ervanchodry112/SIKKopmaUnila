<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}
require 'include/functions.php';
$npm = $_GET['npm'];
$query = "DELETE FROM poin WHERE npm = '$npm';";
mysqli_query($conn, $query);
$query = "DELETE FROM simpanan WHERE npm = '$npm';";
mysqli_query($conn, $query);
$query = "DELETE FROM anggota WHERE npm = '$npm ';";
mysqli_query($conn, $query);

if (mysqli_affected_rows($conn) > 0) {
    echo "<script>
        alert('Data Berhasil dihapus');
        location.href = 'index.php';
    </script>";
} else {
    echo "<script>
        alert('Terjadi Kesalahan');
    </script>";
}
