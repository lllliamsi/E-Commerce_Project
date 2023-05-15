<?php
// menghubungkan header dan sidebar
require_once 'header.php';
require_once 'sidebar.php';

// menghubungkan ke database
require_once '../dbkoneksi.php';

//memilih data dari database
$sql = "SELECT * FROM produk";
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
                            <h3>Data Produk</h3>
                            <a class="btn btn-primary" href="tambah_produk.php">Tambah Produk</a>
                        </div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Kode</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Harga Jual</th>
                                        <th scope="col">Harga Beli</th>
                                        <th scope="col">Stok</th>
                                        <th scope="col">Minimal Stok</th>
                                        <th scope="col">Deskripsi</th>
                                        <th scope="col">Kategori</th>
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
                                                <?= $row['kode'] ?>
                                            </td>
                                            <td>
                                                <?= $row['nama'] ?>
                                            </td>
                                            <td>
                                                <?= $row['harga_jual'] ?>
                                            </td>
                                            <td>
                                                <?= $row['harga_beli'] ?>
                                            </td>
                                            <td>
                                                <?= $row['stok'] ?>
                                            </td>
                                            <td>
                                                <?= $row['min_stok'] ?>
                                            </td>
                                            <td>
                                                <?= $row['deskripsi'] ?>
                                            </td>
                                            <td>
                                                <?php
                                                $idkategori = $row['kategori_produk_id'];
                                                $sqlkategori = "SELECT nama FROM kategori_produk WHERE id = '$idkategori'";
                                                $rskategori = $dbh->query($sqlkategori);
                                                $kategori = $rskategori->fetch(PDO::FETCH_ASSOC);
                                                echo $kategori['nama'];
                                                ?>
                                            </td>
                                            <td>
                                                <a class="btn btn-info"
                                                    href="detail_produk.php?id=<?= $row['id'] ?>">Detail</a>
                                                <a class="btn btn-warning"
                                                    href="tambah_produk.php?idedit=<?= $row['id'] ?>">Edit</a>
                                                <a class="btn btn-danger" href="delete_produk.php?iddel=<?= $row['id'] ?>"
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