<?php 
// koneksi database
include '../../koneksi.php';

// menangkap data yang di kirim dari form
$PelangganID = $_POST['PelangganID'];
$PenjualanID = $_POST['PenjualanID'];

// menginput data ke database
mysqli_query($koneksi,"INSERT INTO `detailpenjualan`(`DetailID`, `PenjualanID`, `ProdukID`, `JumlahProduk`, `Subtotal`) values (0,'$PenjualanID',0,0,0)");

// mengalihkan halaman kembali ke detail_pembelian.php
header("location:detail_pembelian.php?PelangganID=$PelangganID");
?>