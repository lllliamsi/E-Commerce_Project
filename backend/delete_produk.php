<?php 
require_once '../dbkoneksi.php';
// simpen data iddel
$delete = $_GET['iddel'];
// bikin query sql
$sql = "DELETE FROM produk WHERE id=?";
// siapin query
$st = $dbh->prepare($sql);
// eksekusi query
$st->execute([$delete]);


header('location:produk.php');
?>