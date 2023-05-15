<?php
// menghubungkan ke database
require_once 'dbkoneksi.php';

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
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true" data-bs-interval="3000">
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
                <h1 class="text-center">Detail Produk</h1>
            </div>
            <div class="row p-5 ">
                <div class="col-12 d-flex justify-content-center align-items-center">
                    <div class="card mb-3 bg-light shadow p-3 mb-5 bg-body rounded" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="assets/images/tokoliam-logo-kotak.svg" class="img-fluid rounded-start"
                                    alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <table class="table table-striped">
                                        <tbody>
                                            <tr>
                                                <td>Nama</td>
                                                <td>
                                                    <?= $row['nama'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Harga</td>
                                                <td>
                                                    <?= $row['harga_jual'] ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Stok</td>
                                                <td>
                                                    <?= $row['stok'] ?>
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
                                                    <?php
                                                    $idkategori = $row['kategori_produk_id'];
                                                    $sqlkategori = "SELECT nama FROM kategori_produk WHERE id = '$idkategori'";
                                                    $rskategori = $dbh->query($sqlkategori);
                                                    $kategori = $rskategori->fetch(PDO::FETCH_ASSOC);
                                                    echo $kategori['nama'];
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><a class="btn btn-danger" href="index.php">Kembali</a></td>
                                                <td><a class="btn btn-primary" href="form_pemesanan.php">Beli Produk</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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