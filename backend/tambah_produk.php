<?php
// menghubungkan header dan sidebar
require_once 'header.php';
require_once 'sidebar.php';

// menghubungkan ke database
require_once '../dbkoneksi.php';

//membuat kondisi untuk mengedit data pelanggan 
if (!empty($_GET['idedit'])) {
    $edit = $_GET['idedit'];
    //untuk menampilkan data dengan perintah select
    $sql = "SELECT * FROM produk WHERE id=?";
    $st = $dbh->prepare($sql);
    //intruksi untuk menjalankan program 
    $st->execute([$edit]);
    //untuk menampilkan baris di setiap data 
    $row = $st->fetch();
} else {
    //untuk membuat data baru 
    $row = [];
}
;
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
                            <h2 class="text-center">Form Produk</h2>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="proses_produk.php">
                                <div class="form-group row">
                                    <label for="kode" class="col-4 col-form-label">Kode</label>
                                    <div class="col-8">
                                        <input id="kode" name="kode" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama" class="col-4 col-form-label">Nama Produk</label>
                                    <div class="col-8">
                                        <input id="nama" name="nama" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga_beli" class="col-4 col-form-label">Harga Jual</label>
                                    <div class="col-8">
                                        <input id="harga_jual" name="harga_jual" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga_beli" class="col-4 col-form-label">Harga Beli</label>
                                    <div class="col-8">
                                        <input id="harga_beli" name="harga_beli" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="stok" class="col-4 col-form-label">Stok</label>
                                    <div class="col-8">
                                        <input id="stok" name="stok" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="min_stok" class="col-4 col-form-label">Minimal Stok</label>
                                    <div class="col-8">
                                        <input id="min_stok" name="min_stok" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="deskripsi" class="col-4 col-form-label">Deskripsi</label>
                                    <div class="col-8">
                                        <textarea id="deskripsi" name="deskripsi" cols="40" rows="5"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kategori" class="col-4 col-form-label">Kategori Produk</label>
                                    <div class="col-8">
                                        <?php
                                        $sqlkategori = "SELECT * FROM kategori_produk";
                                        $rskategori = $dbh->query($sqlkategori);
                                        ?>
                                        <select id="kategori" name="kategori" class="custom-select">
                                            <?php
                                            foreach ($rskategori as $rowkategori) {
                                                ?>
                                                <option value="<?= $rowkategori['id'] ?>"><?= $rowkategori['nama'] ?>
                                                </option>
                                                <?php
                                            }
                                            ?>
                                            <!--
        <option value="1">Elektronik</option>
        <option value="2">Furniture</option>
        <option value="3">Makanan</option>-->

                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-4 col-8">
                                        <?php
                                        //melakukan validasi form 
                                        $button = (empty($edit)) ? "Simpan" : "Update";
                                        ?>
                                        <input type="submit" name="proses" type="submit" class="btn btn-primary"
                                            value="<?= $button ?>" />
                                        <input type="hidden" name="idedit" value="<?= $edit ?>">
                                    </div>
                                </div>
                            </form>
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