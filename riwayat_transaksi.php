<?php
$query = "SELECT `a`.`npm`, `a`.`nama`, `b`.`id_transaksi` as `no_ref`, `b`.`nominal`
        FROM `anggota` `a`, `riwayat_transaksi` `b`
        WHERE `a`.`npm` = `b`.`npm`;";

$data = query($query);
?>

<h1 class="pt-2 px-5">Riwayat Transaksi</h1>
<hr class="mt-0 mx-5">
<div class="row mb-3">
    <div class="col mx-5">
        <a href="?page=dashboard" style="color: black;" class="align-baseline">
            <ion-icon name="arrow-back-outline"></ion-icon>
            <span>Back</span>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-7 mx-5 px-4">
        <table class="table table-striped table-responsive tabel-data w-100 text-center fs-6" id="table_riwayat">
            <tr>
                <th scope="col">Kode Transaksi</th>
                <th scope="col">NPM</th>
                <th scope="col">Nama</th>
                <th scope="col">Nominal</th>
            </tr>
            <?php foreach ($data as $d) { ?>
                <tr>
                    <td><?= $d['no_ref'] ?></td>
                    <td><?= $d['npm'] ?></td>
                    <td><?= $d['nama'] ?></td>
                    <td><?= $d['nominal'] ?></td>
                </tr>
            <?php } ?>

        </table>
    </div>

    <!-- Bayar Tagihan -->
    <div class="col-4 border-start text-white mx-auto d-flex justify-content-center">
        <div class="pay-box" style="background-color: #064635;">
            <form action="?page=kode_pembayaran" method="POST">
                <div class="row">
                    <div class="logo mx-auto d-flex justify-content-center">
                        <img class="align-bottom" width="25px" src="asset/img/logo-kopma-unila.png" alt="Logo Kopma Unila">
                        <span class="align-bottom fw-bold">Kopma Unila</span>
                    </div>
                </div>
                <hr color="#FFF" size="4px" class="m-1">
                <div class="row">
                    <div class="col-12 d-flex justify-content-center">
                        <span class="fw-bold">Pembayaran Simpanan</span>
                    </div>
                </div>
                <div class="row mt-3">
                    <label for="nominal" class="fs-6">Nominal Bayar</label>
                </div>
                <div class="row mb-2">
                    <div class="col">
                        <input class="form-control" type="text" name="nominal" id="nominal" placeholder="Nominal" autocomplete="off">
                    </div>
                </div>
                <div class="row">
                    <span>Metode Bayar</span>
                </div>
                <div class="row form-check">
                    <div class="col">
                        <input class="form-check-input" type="radio" name="transfer" id="transferBank">
                        <label class="form-check-label" for="transferBank">
                            Transfer Bank
                        </label>
                    </div>
                </div>
                <div class="row form-check">
                    <div class="col">
                        <input class="form-check-input" type="radio" name="Gopay" id="Gopay">
                        <label class="form-check-label" for="Gopay">
                            Gopay
                        </label>
                    </div>
                </div>
                <div class="row form-check">
                    <div class="col">
                        <input class="form-check-input" type="radio" name="Dana" id="Dana">
                        <label class="form-check-label" for="Dana">
                            Dana
                        </label>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <input class="btn btn-light w-100 btn-sm" type="submit" value="SUBMIT" name="submit">
                    </div>
                </div>
            </form>
        </div>
    </div>