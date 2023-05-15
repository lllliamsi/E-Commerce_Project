<?php
// menghubungkan header dan sidebar
require_once 'header.php';
require_once 'sidebar.php';

// menghubungkan ke database
require_once '../dbkoneksi.php';

// memilih data dari database
$sql = "SELECT * FROM kategori_produk";
$rs = $dbh->query($sql);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>

    <!-- Main content -->
    <section class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-header">
                            <h3>Data Kategori</h3>
                            <a class="btn btn-primary" href="tambah_kategori.php">Tambah Kategori</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama Kategori</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nomor = 1;
                                    foreach ($rs as $row) {
                                        ?>
                                        <tr>
                                            <th scope="row">
                                                <?= $nomor ?>
                                            </th>
                                            <td>
                                                <?= $row['nama'] ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-info"
                                                    href="detail_kategori.php?id=<?= $row['id'] ?>">Detail</a>
                                                <a class="btn btn-warning"
                                                    href="tambah_kategori.php?idedit=<?= $row['id'] ?>">Edit</a>
                                                <a class="btn btn-danger" href="delete_kategori.php?iddel=<?= $row['id'] ?>"
                                                    onclick="if(!confirm('Anda Yakin Hapus Data Produk <?= $row['nama'] ?>?')) {return false}">Delete</a>
                                            </td>
                                        </tr>
                                        <?php
                                        $nomor++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php

require_once 'footer.php';

?>