<?php
$query = "SELECT `a`.`npm`, `a`.`nama`, `a`.`nomor_anggota`, `b`.`simpanan_pokok`, `b`.`simpanan_wajib`, `c`.`total_poin`
        FROM `anggota` `a`, `simpanan` `b`, `poin` `c`
        WHERE `a`.`npm` = `b`.`npm` AND `a`.`npm` = `c`.`npm`;";

$biodata = query($query);
$date_start = date_create('2022-01-01');
$date_now = date_create(date('Y-m-d'));

$month = date_diff($date_start, $date_now);
$month = $month->m;

$tagihan = ($month * 10000) - $biodata[0]['simpanan_wajib'];
if ($tagihan <= 0) {
    $tagihan = 0;
}
?>

<h1 class="pt-2 px-5">Dashboard</h1>
<hr class="mt-0 mx-5">

<div class="row">
    <div class="col-7 mx-5 px-4">
        <h5 class="fw-normal">Halo,</h5>
        <h2 class="fw-bold mt-0"><?= $biodata[0]['nama'] ?></h2>

        <div class="d-flex flex-wrap">
            <div class="box w-25" style="background-color: #519259;">
                <div class="row justify-content-between">
                    <div class="col-3">
                        <span class="align-top me-4" style="font-size: 50px;">
                            <ion-icon name="cash-outline"></ion-icon>
                        </span>
                    </div>
                    <div class="col-8">
                        <!-- Ganti dengan php -->
                        <span class="fs-2 text-end fw-bold align-top">
                            Rp <?= $biodata[0]['simpanan_pokok'] + $biodata[0]['simpanan_wajib'] ?>
                        </span>
                    </div>
                </div>
                <div class="row mt-4 d-flex justify-content-between">
                    <div class="col-7">
                        <span class="fw-bolder fs-6">Total Simpanan</span>
                    </div>
                    <div class="col">
                        <a class="link-light fw-bold link" href="?page=riwayat">Rincian >></a>
                    </div>
                </div>
            </div>
            <div class="box w-25" style="background-color: #F0BB62;">
                <div class="row">
                    <div class="col-3">
                        <span class="align-bottom me-4" style="font-size: 50px;">
                            <ion-icon name="diamond-outline"></ion-icon>
                        </span>
                    </div>
                    <div class="col-8 text-end">
                        <!-- Ganti dengan php -->
                        <span class="fs-2 text-end fw-bold align-bottom">
                            <?= $biodata[0]['total_poin'] ?>
                        </span>
                        <span class="align-bottom fs-5">poin</span>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <span class="fw-bolder fs-6">Total Poin</span>
                    </div>
                </div>
            </div>
            <div class="box w-25" style="background-color: #064635;">
                <div class="row justify-content-between">
                    <div class="col-3">
                        <span class="align-bottom me-4" style="font-size: 50px;">
                            <ion-icon name="receipt-outline"></ion-icon>
                        </span>
                    </div>
                    <div class="col-8">
                        <!-- Ganti dengan php -->
                        <span class="fs-2 text-end fw-bold align-top">
                            Rp <?= $tagihan ?>
                        </span>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col">
                        <span class="fw-bolder fs-6">Tagihan</span>
                    </div>
                </div>
            </div>
        </div>
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