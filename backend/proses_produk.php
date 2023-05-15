<?php 
require_once '../dbkoneksi.php';
?>
<?php 
   $_kode = $_POST['kode'];
   $_nama = $_POST['nama'];
   $_hj = $_POST['harga_jual'];
   $_hb = $_POST['harga_beli'];
   $_stok = $_POST['stok'];
   $_minstok = $_POST['min_stok'];
   $_deskripsi = $_POST['deskripsi'];
   $_kategori = $_POST['kategori'];

   $_proses = $_POST['proses'];


   // array data
   $ar_data[]=$_kode; // ? 2
   $ar_data[]=$_nama;// 3
   $ar_data[]=$_hj;
   $ar_data[]=$_hb;
   $ar_data[]=$_stok;
   $ar_data[]=$_minstok;
   $ar_data[]=$_deskripsi;
   $ar_data[]=$_kategori;

   if($_proses == "Simpan"){
    // data baru
    $sql = "INSERT INTO produk (kode,nama,harga_jual,harga_beli,stok,
    min_stok,deskripsi,kategori_produk_id) VALUES (?,?,?,?,?,?,?,?)";
   }else if($_proses == "Update"){
    $ar_data[]=$_POST['idedit'];
    $sql = "UPDATE produk SET kode=?,nama=?,harga_jual=?,harga_beli=?,
    stok=?,min_stok=?,deskripsi=?,kategori_produk_id=? WHERE id=?";
   }
   if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
   }

   header('location:produk.php');
?>