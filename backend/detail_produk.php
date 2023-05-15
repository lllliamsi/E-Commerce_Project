<?php
// menghubungkan header dan sidebar
require_once 'header.php';
require_once 'sidebar.php';

// menghubungkan ke database
require_once '../dbkoneksi.php';
?>

<?php
$_id = $_GET['id'];
// select * from produk where id = $_id;
//$sql = "SELECT a.*,b.nama as jenis FROM produk a
//INNER JOIN jenis_produk b ON a.jenis_produk_id=b.id WHERE a.id=?";
$sql = "SELECT * FROM produk WHERE id=?";
$st = $dbh->prepare($sql);
$st->execute([$_id]);
$row = $st->fetch();
//echo 'NAMA PRODUK ' . $row['nama'];
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
                            <h3>Detail Produk</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <tbody>
                                    <tr>
                                        <td>ID</td>
                                        <td>
                                            <?= $row['id'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kode</td>
                                        <td>
                                            <?= $row['kode'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Nama Produk</td>
                                        <td>
                                            <?= $row['nama'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Harga Jual</td>
                                        <td>
                                            <?= $row['harga_jual'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Harga Beli</td>
                                        <td>
                                            <?= $row['harga_beli'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Stok</td>
                                        <td>
                                            <?= $row['stok'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Minimum Stok</td>
                                        <td>
                                            <?= $row['min_stok'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Deskripsi</td>
                                        <td>
                                            <?= $row['deskripsi'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kategori Produk</td>
                                        <td>
                                            <?= $row['kategori_produk_id'] ?>
                                        </td>
                                    </tr>
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