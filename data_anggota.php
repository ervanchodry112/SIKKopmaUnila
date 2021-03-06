<?php
$query = "SELECT a.npm as npm, a.nama as nama, a.nomor_handphone as nomor,
        a.nomor_anggota, a.email as email, b.nama_jurusan, c.nama_fakultas
        FROM anggota a, jurusan b, fakultas c
        WHERE a.id_jurusan = b.id_jurusan AND b.id_fakultas = c.id_fakultas;";
$data = query($query);
?>

<div class="container p-0">
    <div class="row pt-3 mb-3">
        <div class="col">
            <h4 class="ps-3">Data Anggota</h4>
        </div>
        <hr>
    </div>
    <div class="row mx-2 mb-2">
        <div class="col d-flex justify-content-between">
            <!-- Search Fiela -->
            <div class="col d-flex align-items-center">
                <a class="btn btn-success btn-sm text-white align-items-center me-2 rounded-3" href="tambah_data.php">
                    <span class="fs-6 align-middle">
                        <ion-icon name="add-outline"></ion-icon>
                    </span>
                    <span class="align-middle">Add</span>
                </a>
                <ion-icon name="search-outline" class="ms-auto"></ion-icon>
                <form class="form w-25">
                    <input type="search" class="form-control d-flex rounded-pill ms-1" style="height: 28px;" placeholder="Search" aria-label="Search" id="fieldSearch" autocomplete="off">
                </form>
            </div>
            <!-- Search Field -->


            <!-- </div> -->
        </div>
    </div>
    <div class="container overflow-scroll">
        <table class="table table-striped table-responsive tabel-data" style="font-size: 12px;" id="tableData">
            <tr>
                <?php if ($_SESSION['role'] == 3) { ?>
                    <th scope="col">Action</th>
                <?php } ?>
                <th scope="col">NPM</th>
                <th scope="col">Nama</th>
                <th scope="col">Nomor Anggota</th>
                <th scope="col">Jurusan</th>
                <th scope="col">Fakultas</th>
                <th scope="col">Nomor WA</th>
                <th scope="col">Email</th>
            </tr>
            <?php foreach ($data as $d) { ?>
                <tr id="<?= $d['npm'] ?>">
                    <?php if ($_SESSION['role'] == 3) { ?>
                        <td>
                            <a href="hapus.php?npm=<?= $d['npm'] ?>" type="button" onclick="return confirm('Apakah ingin menghapus') " class="btn btn-danger btn-sm">
                                <ion-icon name="trash-outline"></ion-icon>
                            </a>
                        </td>
                    <?php } ?>
                    <td><?= $d['npm'] ?></td>
                    <td><?= $d['nama'] ?></td>
                    <td><?= $d['nomor_anggota'] ?></td>
                    <td><?= $d['nama_jurusan'] ?></td>
                    <td><?= $d['nama_fakultas'] ?></td>
                    <td><?= $d['nomor'] ?></td>
                    <td><?= $d['email'] ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>