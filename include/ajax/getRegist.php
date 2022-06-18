<?php
require '../functions.php';

try {
    $id = $_GET["id"];
    $query = "SELECT calon_anggota.npm, calon_anggota.nama_lengkap, calon_anggota.nama_panggilan, 
     jurusan.nama_jurusan, fakultas.nama_fakultas, calon_anggota.nomor_hp, calon_anggota.email, asal_informasi.nama_platform,
     calon_anggota.domisili, calon_anggota.alasan, calon_anggota.kode_referal, calon_anggota.foto,
     calon_anggota.ktm, calon_anggota.bukti_pembayaran
     FROM calon_anggota, fakultas, jurusan, asal_informasi
     WHERE (calon_anggota.nama_lengkap LIKE '%" . $id . "%'
     OR calon_anggota.npm LIKE '%" . $id . "%'
     OR jurusan.nama_jurusan LIKE '%" . $id . "%'
     OR fakultas.nama_fakultas LIKE '%" . $id . "%')
     AND calon_anggota.id_jurusan = jurusan.id_jurusan 
     AND jurusan.id_fakultas = fakultas.id_fakultas
     AND calon_anggota.asal_informasi = asal_informasi.id_informasi;";
    $data_anggota = query($query);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>

<tr>
    <th scope="col">Action</th>
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
    <th scope="col">Foto Diri</th>
    <th scope="col">Foto KTM</th>
    <th scope="col">Bukti Pembayaran</th>
</tr>
<?php if ($data_anggota != NULL) { ?>
    <?php foreach ($data_anggota as $d) { ?>
        <tr id="<?= $d['npm'] ?>">
            <td>
                <a href="hapus.php?npm=<?= $d['npm'] ?>" type="button" onclick="return confirm('Apakah ingin menghapus') " class="btn btn-danger btn-sm">
                    <ion-icon name="trash-outline"></ion-icon>
                </a>
            </td>
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
            <td><?= $d['foto'] ?></td>
            <td><?= $d['ktm'] ?></td>
            <td>
                <a target="blank" href="../pendaftaran/include/upload/<?= $d['bukti_pembayaran'] ?>">
                    <?= $d['bukti_pembayaran'] ?>
                </a>
            </td>
        </tr>
    <?php } ?>
<?php } else { ?>
    <tr>
        <td colspan="15" class="text-center">Tidak ada data yang ditemukan</td>
    </tr>
<?php } ?>