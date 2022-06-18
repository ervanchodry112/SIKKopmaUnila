<?php
require '../functions.php';

try {
    $id = $_GET["id"];
    $query = "SELECT * FROM jurusan WHERE jurusan.id_fakultas = " . $id . " ORDER BY jurusan.nama_jurusan ASC;";
    $jurusan = query($query);
} catch (Exception $e) {
    echo $e->getMessage();
}
?>



<option selected>-- Pilih Jurusan --</option>
<?php foreach ($jurusan as $data) { ?>
    <option value=" <?= $data["id_jurusan"] ?> "> <?= $data["nama_jurusan"] ?> </option>
<?php } ?>
<option value="lainnya" id="others">Lainnya</option>
<!-- <option value=" ">Lainnya</option> -->