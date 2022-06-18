<?php

require 'config.php';

$conn = mysqli_connect($server, $user, $pass, $db);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function for take data from database and return it as an array
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $data = [];
    while ($row = mysqli_fetch_array($result)) {
        $data[] = $row;
    }
    return $data;
}

function regist($data)
{
    global $conn;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['pass']);
    $confirm = mysqli_real_escape_string($conn, $data['confirm']);
    $role = $data['role'];

    $result = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

    if (mysqli_fetch_row($result)) {
        echo "<script>
        alert('username sudah terdaftar')
        </script>";
        return false;
    }


    if ($password !== $confirm) {
        echo "<script>
        alert('Password tidak sama');
        </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO users VALUES ('$username', '$password', '$role')");

    return mysqli_affected_rows($conn);
}

function addAnggota($data)
{
    global $conn;
    $npm = $data['npm'];
    $nama = $data['nama'];
    $no_anggota = $data['nomor_anggota'];
    $nomor = $data['nomor_hp'];
    $jurusan = $data['jurusan'];
    $email = $data['email'];
    $simpanan_pokok = $data['simpanan_pokok'];
    $simpanan_wajib = $data['simpanan_wajib'];
    $poin = $data['poin'];

    $query = "INSERT INTO anggota VALUES ('" . $npm . "', '" . $nama . "', '" . $nomor . "', '" . $no_anggota . "', '" . $email . "', '" . $jurusan . "');";
    mysqli_query($conn, $query);
    $query = "INSERT INTO simpanan VALUES ('', '$simpanan_wajib', '$simpanan_pokok', '" . $npm . "');";
    mysqli_query($conn, $query);
    $query = "INSERT INTO poin VALUES ('', '$poin', '$npm');";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        return true;
    } else {
        return false;
    }
}

function editSimpanan($data)
{
    global $conn;
    $npm = $data['npm'];
    $simwa = $data['simpanan_wajib'];
    $simpok = $data['simpanan_pokok'];

    $query = "UPDATE simpanan SET simpanan_wajib = '$simwa', simpanan_pokok = '$simpok'
            WHERE npm = '$npm'";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        return true;
    } else {
        return false;
    }
}

function tambahSimpanan($data)
{
    global $conn;
    $npm = $data['npm'];
    $simwa = $data['simpanan_wajib'];
    $simpok = $data['simpanan_pokok'];

    $query = "INSERT INTO simpanan VALUES('', '$simwa', '$simpok', '$npm')";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        return true;
    } else {
        return false;
    }
}

function tambahPoin($data)
{
    global $conn;
    $npm = $data['npm'];
    $poin = $data['poin'];

    $query = "INSERT INTO poin VALUES ('', '$poin', '$npm');";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        return true;
    } else {
        return false;
    }
}

function editPoin($data)
{
    global $conn;
    $npm = $data['npm'];
    $poin = $data['poin'];

    $query = "UPDATE poin SET total_poin = '$poin' WHERE npm = '$npm';";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        return true;
    } else {
        return false;
    }
}

function tambahProduk($data)
{
    global $conn;
    $nama_produk = $data['nama_produk'];
    $harga_produk = $data['harga_produk'];
    $stok = $data['stok'];

    $query = "INSERT INTO produk VALUES ('', '$nama_produk', '$harga_produk', '$stok');";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        return true;
    } else {
        return false;
    }
}

function editProduk($data)
{
    global $conn;
    $id = $data['id'];
    $nama_produk = $data['nama_produk'];
    $harga_produk = $data['harga_produk'];
    $stok = $data['stok'];

    $query = "UPDATE produk SET nama_produk = '$nama_produk', harga_produk = '$harga_produk',
            stok = '$stok' WHERE id_produk = '$id';";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        return true;
    } else {
        return false;
    }
}

function randomString($length)
{
    $str        = "";
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ123456789';
    $max        = strlen($characters) - 1;
    for ($i = 0; $i < $length; $i++) {
        $rand = mt_rand(0, $max);
        $str .= $characters[$rand];
    }
    return $str;
}
