<?php
$query = "SELECT * FROM users;";
$data = query($query);
?>

<div class="container p-0">
    <div class="row pt-3 mb-3">
        <div class="col">
            <h4 class="ps-3">Akun</h4>
        </div>
        <hr>
    </div>
    <div class="row mx-2 mb-2">
        <div class="col d-flex justify-content-between">
            <!-- Search Fiela -->
            <div class="col d-flex align-items-center">
                <a class="btn btn-success btn-sm text-white align-items-center me-2 rounded-3" href="regist.php">
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
                <th scope="col">Username</th>
                <th scope="col">Password</th>
                <th scope="col">Permission</th>
            </tr>
            <?php foreach ($data as $d) { ?>
                <tr username="<?= $d['username'] ?>">
                    <?php if ($_SESSION['role'] == 3) { ?>
                        <td>
                            <a href="hapus.php?username=<?= $d['username'] ?>" type="button" onclick="return confirm('Apakah ingin menghapus') " class="btn btn-danger btn-sm">
                                <ion-icon name="trash-outline"></ion-icon>
                            </a>
                        </td>
                    <?php } ?>
                    <td><?= $d['username'] ?></td>
                    <td>********</td>
                    <td><?= $d['permission'] ?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>