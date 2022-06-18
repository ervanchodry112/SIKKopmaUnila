<?php

$kode_pembayaran = randomString(16);

$nominal = $_POST['nominal'];
?>

<div class="container" style="height: 100vh;">
    <div class="d-flex align-items-center justify-content-center" style="height: 80vh;">
        <div class="box-kode shadow">
            <div class="my-auto">
                <div class="row">
                    <div class="col">
                        <h1 class="fw-bold text-center">Pembayaran</h1>
                    </div>
                </div>
                <hr class="m-1">
                <div class="row mb-1">
                    <div class="col d-flex justify-content-center">
                        <span class="text-center pt-2">Nomor Virtual Account</span>
                    </div>
                </div>
                <form action="?page=success" method="POST">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <div class="bg-white w-75">
                                <input type="text" name="kode_pembayaran" id="kode_pembayaran" value="<?= $kode_pembayaran ?>" readonly class="text-black form-control text-center fs-5 fw-bold">
                            </div>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col d-flex justify-content-center">
                            <span class="text-center pt-2">Berlaku Sampai</span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col d-flex justify-content-center">
                            <div class="bg-white w-75">
                                <span class="text-black form-control text-center fs-6 fw-bold">
                                    1 Mei 2022
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <input type="text" name="nominal" id="nominal" value="<?= $nominal ?>" hidden>
                        <div class="col d-flex justify-content-center">
                            <input type="submit" value="Konfirmasi Pembayaran" class="w-75 btn btn-warning">
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>