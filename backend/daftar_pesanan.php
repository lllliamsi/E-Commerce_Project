<?php
// menghubungkan header dan sidebar
require_once 'header.php';
require_once 'sidebar.php';

// menghubungkan ke database
require_once '../dbkoneksi.php';

// memilih data dari database
$sql = "SELECT * FROM pesanan";
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
                            <h3>Data Pesanan</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">No Hp</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Produk</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Deskripsi</th>
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
                                                <?= $row['nama_pemesan'] ?>
                                            </td>
                                            <td>
                                                <?= $row['tanggal'] ?>
                                            </td>
                                            <td>
                                                <?= $row['alamat_pemesan'] ?>
                                            </td>
                                            <td>
                                                <?= $row['no_hp'] ?>
                                            </td>
                                            <td>
                                                <?= $row['email'] ?>
                                            </td>
                                            <td>
                                                <?= $row['produk_id'] ?>
                                            </td>
                                            <td>
                                                <?= $row['jumlah_pesanan'] ?>
                                            </td>
                                            <td>
                                                <?= $row['deskripsi'] ?>
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