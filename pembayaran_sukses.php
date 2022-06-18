<?php
$query = "SELECT simpanan_wajib FROM simpanan WHERE npm = '2017051001'";
$data = query($query);
$nominal = $_POST['nominal'];
$kode_pembayaran = $_POST['kode_pembayaran'];
$new_simpanan = $data[0]['simpanan_wajib'] + $nominal;

if (isset($_POST['nominal'])) {
    $query = "INSERT INTO riwayat_transaksi VALUES ('$kode_pembayaran', '$nominal', '2017051001');";
    mysqli_query($conn, $query);
    $query = "UPDATE simpanan SET simpanan_wajib = '$new_simpanan' WHERE npm = '2017051001'";
    mysqli_query($conn, $query);
}
?>

<div class="container" style="height: 100vh;">
    <div class="d-flex align-items-center justify-content-center" style="height: 80vh;">
        <div class="w-75">
            <div class="my-auto">
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        <span style="color: #9AE66E; font-size: 100px;">
                            <ion-icon name="checkmark-circle"></ion-icon>
                        </span>
                    </div>
                </div>
                <div class="row" style="margin-top: -30px;">
                    <div class="col">
                        <h1 class="fw-bold text-center">Pembayaran Berhasil</h1>
                    </div>
                </div>
                <hr class="m-1">
                <div class="row mb-1">
                    <div class="col d-flex justify-content-center">
                        <span class="text-center pt-2 fs-5">Hore Pembayaranmu Sudah Selesai!</span>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col d-flex justify-content-center">
                        <span class="text-center pt-2 fs-4 fw-bold">Jumlah Pembayaran</span>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col d-flex justify-content-center">
                        <span class="text-black text-center fs-2 fw-bold">
                            Rp <?= $nominal ?>
                        </span>
                    </div>
                </div>
                <div class="row">
                    <div class="col d-flex justify-content-center">
                        <a href="?page=halaman_anggota" class="w-75 btn btn-success">
                            Kembali ke Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>