<?php
// menghubungkan ke database
require_once 'dbkoneksi.php';

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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="assets/images/tokoliam-logo-kotak.svg">
    <title>Tokoliam</title>
    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
    <style>
        .bg-tokopedia {
            background-color: rgb(66, 181, 72);
        }

        .text-tokopedia {
            color: rgb(66, 181, 72);
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-white bg-gradient fixed-top">
        <div class="container">
            <a class="navbar-brand p-0" href="index.php">
                <img src="assets/images/tokoliam_logo.svg" alt="Tokoliam" width="150 px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link text-tokopedia" aria-current="page" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-tokopedia" href="form_pemesanan.php">Pesanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-muted" href="backend/admin.php">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end navbar -->
    <br>
    <br>
    <!-- Informasi umum -->
    <section class="bg-secondary bg-opacity-25 bg-gradient">
        <div class="container p-5">
            <div class="row">
                <div class="col-12">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true"
                        data-bs-interval="3000">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                                class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                                aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                                aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                                aria-label="Slide 4"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="assets/images/1.svg" class="d-block w-100" alt="Banner 1">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/2.svg" class="d-block w-100" alt="Banner 2">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/3.svg" class="d-block w-100" alt="Banner 3">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/images/4.svg" class="d-block w-100" alt="Banner 4">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end informasi umum -->

    <!-- Informasi produk -->
    <section class="bg-secondary bg-opacity-10 bg-gradient">
        <div class="container p-4">
            <div class="row section-tittle">
                <h1 class="text-center">Form Pemesanan Produk</h1>
            </div>
            <div class="row p-5 ">
                <form method="POST" action="proses_pesanan.php">
                    <div class="form-group row">
                        <label for="nama" class="col-4 col-form-label">Nama</label>
                        <div class="col-8">
                            <input id="nama_pemesan" name="nama_pemesan" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="alamat" class="col-4 col-form-label">Alamat</label>
                        <div class="col-8">
                            <input id="alamat_pemesan" name="alamat_pemesan" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tanggal" class="col-4 col-form-label">Tanggal Pembelian</label>
                        <div class="col-8">
                            <input id="tanggal" name="tanggal" type="date" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="produk" class="col-4 col-form-label">Produk</label>
                        <div class="col-8">
                            <?php
                            $sqlprodukid = "SELECT * FROM produk";
                            $rsprodukid = $dbh->query($sqlprodukid);
                            ?>
                            <select id="produk_id" name="produk_id" class="custom-select">
                                <?php
                                foreach ($rsprodukid as $rowprodukid) {
                                    ?>
                                    <option value="<?= $rowprodukid['id'] ?>"><?= $rowprodukid['nama'] ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="no_hp" class="col-4 col-form-label">Nomor HP</label>
                        <div class="col-8">
                            <input id="no_hp" name="no_hp" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-4 col-form-label">Email</label>
                        <div class="col-8">
                            <input id="email" name="email" type="email" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah_pesanan" class="col-4 col-form-label">Jumlah Pesanan</label>
                        <div class="col-8">
                            <input id="jumlah_pesanan" name="jumlah_pesanan" type="text" class="form-control">
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
        </div>
    </section>

    <!-- footer -->
    <footer class="fixed-bottom bg-tokopedia">
        <div class="footer-copyright">
            <div class="container">
                <div class="row align-items-center">
                    <div class="copyright text-center text-lg-left mt-10 pt-2">
                        <p class="text-light float-center">©2023 Designed by <a
                                class="text-tokopedia fst-italic text-decoration-none" rel="nofollow" href="#">liam</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


    <script src="assets/js/bootstrap.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>
    <!-- Required JavaScript Libraries -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.2/js/bootstrap.min.js"></script>

</body>

</html>