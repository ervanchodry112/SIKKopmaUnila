<?php
session_start();
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}
include 'include/functions.php';
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=anggota-baru.xls");
$query = "SELECT calon_anggota.npm, calon_anggota.nama_lengkap, calon_anggota.nama_panggilan, 
     jurusan.nama_jurusan, fakultas.nama_fakultas, calon_anggota.nomor_hp, calon_anggota.email, asal_informasi.nama_platform,
     calon_anggota.domisili, calon_anggota.alasan, calon_anggota.kode_referal, calon_anggota.foto,
     calon_anggota.ktm, calon_anggota.bukti_pembayaran

     FROM calon_anggota, fakultas, jurusan, asal_informasi
     WHERE calon_anggota.id_jurusan = jurusan.id_jurusan 
     AND jurusan.id_fakultas = fakultas.id_fakultas
     AND calon_anggota.asal_informasi = asal_informasi.id_informasi";
$data = query($query);
?>

<h3>Data Pendaftaran Anggota Baru</h3>

<table border="1">
    <tr>
        <th scope="col">NPM</th>
        <th scope="col">Nama</th>
        <th scope="col">Panggilan</th>
        <th scope="col">Jurusan</th>
        <th scope="col">Fakultas</th>
        <th scope="col">Nomor WA</th>
        <th scope="col">Email</th>
        <th scope="col">Asal Informasi</th>
        <th scope="col">Domisili</th>
        <th scope="col">Alasan Masuk Kopma</th>
        <th scope="col">Kode Referal</th>
    </tr>
    <?php foreach ($data as $d) { ?>
        <tr>
            <td><?= $d['npm'] ?></td>
            <td><?= $d['nama_lengkap'] ?></td>
            <td><?= $d['nama_panggilan'] ?></td>
            <td><?= $d['nama_jurusan'] ?></td>
            <td><?= $d['nama_fakultas'] ?></td>
            <td><?= $d['nomor_hp'] ?></td>
            <td><?= $d['email'] ?></td>
            <td><?= $d['nama_platform'] ?></td>
            <td><?= $d['domisili'] ?></td>
            <td><?= $d['alasan'] ?></td>
            <td><?= $d['kode_referal'] ?></td>
        </tr>
    <?php } ?>
</table>