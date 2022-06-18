<?php
$npm = $_GET['npm'];
$query = "SELECT * FROM anggota, jurusan, fakultas WHERE anggota.npm = '$npm'
        AND anggota.id_jurusan = jurusan.id_jurusan AND jurusan.id_fakultas = fakultas.id_fakultas";
$biodata = query($query);
$query = "SELECT * FROM fakultas";
$fakultas = query($query);

if (isset($_POST['submit'])) {
    $query = "UPDATE anggota SET nama = '" . $_POST['nama'] . "', email = '" . $_POST['email'] . "',
            nomor_handphone = '" . $_POST['nomor_hp'] . "' WHERE npm = '$npm';";
    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn) > 0) {
        echo "<script>
        alert('Data Berhasil ditambahkan');
    </script>";
        header('Location: index.php?page=dashboard');
        exit;
    } else {
        echo "<script>
        alert('Data Gagal ditambahkan');
    </script>";
    }
}
?>

<form action="" method="POST" class="mx-3" style="margin-top: 75px;">
    <div class="row">
        <div class="h1 text-center mb-4">
            Ubah Biodata
        </div>
    </div>
    <hr>
    <div class="row mb-3">
        <a href="?page=dashboard" style="color: black;" class="align-baseline">
            <ion-icon name="arrow-back-outline"></ion-icon>
            <span>Back</span>
        </a>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="npm" class="ms-2">NPM</label>
            <div class="form-floating-sm text-muted">
                <input type="text" class="form-control" name="npm" id="npm" value="<?= $biodata[0]['npm'] ?>" readonly>
            </div>
        </div>
        <div class="col-6">
            <label for="npm" class="ms-2">Nama</label>
            <div class="form-floating-sm text-muted">
                <input type="text" class="form-control" name="nama" id="nama" value="<?= $biodata[0]['nama'] ?>">
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="nomor_anggota" class="ms-2">Nomor Anggota</label>
            <div class="form-floating-sm text-muted">
                <input type="text" class="form-control" name="nomor_anggota" id="nomor_anggota" value="<?= $biodata[0]['nomor_anggota'] ?>" readonly>
            </div>
        </div>
        <div class="col-6">
            <label for="email" class="ms-2">Email</label>
            <div class="form-floating-sm text-muted">
                <input type="email" class="form-control" name="email" id="email" value="<?= $biodata[0]['email'] ?>">
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-6">
            <label for="nomor_hp" class="ms-2">Nomor Handphone</label>
            <div class="form-floating-sm text-muted">
                <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" value="<?= $biodata[0]['nomor_handphone'] ?>">
            </div>
        </div>
    </div>
    <div class="row">
        <input type="submit" value="submit" name="submit" class="btn btn-primary mx-2">
    </div>

</form>