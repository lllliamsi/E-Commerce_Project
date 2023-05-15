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
    $sql = "SELECT * FROM kategori_produk WHERE id=?";
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
                            <h2 class="text-center">Kategori</h2>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="proses_kategori.php">
                                <div class="form-group row">
                                    <label for="kode" class="col-4 col-form-label">Kategori yang ingin ditambahkan</label>
                                    <div class="col-8">
                                        <input id="nama" name="nama" type="text" class="form-control">
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