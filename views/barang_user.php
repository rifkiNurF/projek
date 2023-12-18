<?php
$halaman = "Barang User";
include_once 'template/header.php';
include_once 'template/sidebar.php';
include_once 'template/topbar.php';


include_once '../controllers/c_barang.php';

$barang = new c_barang();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"><?= $halaman ?></h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar <?= $halaman ?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Gambar</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        <?php

                        $nomor = 1;

                        foreach ($barang->tampil() as $b) {
                        ?>

                            <tr>
                                <td><?= $nomor++ ?></td>
                                <td><?= $b->nama_barang ?></td>
                                <td><?= $b->qty ?></td>
                                <td><?= $b->harga ?></td>
                                <td>
                                    <div style="display: flex; justify-content: center; align-items: center;">
                                        <img src="<?= "../assets/img/" . $b->photo; ?>" alt="<?= $b->nama_barang ?>" width="50" height="65">
                                    </div>
                                </td>
                            </tr>

                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<?php
include_once 'template/footer.php';
?>