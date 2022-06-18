<?php
$query = "SELECT * FROM produk;";
$data = query($query);
?>

<div class="container p-0">
    <div class="row pt-3 mb-3">
        <div class="col">
            <h4 class="ps-3">Data Produk</h4>
        </div>
        <hr>
    </div>
    <div class="row mx-2 mb-2">
        <div class="col d-flex justify-content-between">
            <!-- Search Fiela -->
            <div class="col d-flex align-items-center">
                <a class="btn btn-success btn-sm text-white align-items-center me-2 rounded-3" href="tambah_produk.php">
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
        <table class="table table-striped table-responsive tabel-data w-100 text-center fs-6" style="font-size: 12px;" id="tableData">
            <tr>
                <th scope="col">Action</th>
                <th scope="col">Nama Produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
            </tr>
            <?php foreach ($data as $d) { ?>
                <tr id="<?= $d['id_produk'] ?>">
                    <td>
                        <a href="hapus_produk.php?id=<?= $d['id_produk'] ?>&table=produk" type="button" onclick="return confirm('Apakah ingin menghapus') " class="btn btn-danger btn-sm">
                            <ion-icon name="trash-outline"></ion-icon>
                        </a>
                        <a href="edit_produk.php?id=<?= $d['id_produk'] ?>&nama=<?= $d['nama_produk'] ?>&harga=<?= $d['harga_produk'] ?>&stok=<?= $d['stok'] ?>" type="button" class="btn btn-sm btn-success">
                            <ion-icon name="create-outline"></ion-icon>
                        </a>
                    </td>
                    <td><?= $d['nama_produk'] ?></td>
                    <td>Rp <?= $d['harga_produk'] ?></td>
                    <td><?= $d['stok'] ?> pcs</td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>