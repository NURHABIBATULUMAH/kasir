<?php 
// koneksi database
include '../../koneksi.php';

// menangkap data yang di kirim dari form
$PelangganID = $_POST['PelangganID'];
$NamaPelanggan = $_POST['NamaPelanggan'];
$NomorTelepon = $_POST['NomorTelepon'];
$Alamat = $_POST['Alamat'];
$TanggalPenjualan = $_POST['TanggalPenjualan'];
// menginput data ke database
mysqli_query($koneksi,"INSERT INTO `pelanggan`(`PelangganID`,`NamaPelanggan`, `Alamat`, `NomorTelepon`) VALUES('$PelangganID','$NamaPelanggan','$Alamat','$NomorTelepon')");
mysqli_query($koneksi,"INSERT INTO `penjualan`(`TanggalPenjualan`,`PelangganID`)  VALUES ('$TanggalPenjualan','$PelangganID')");
// if (!$koneksi -> query("INSERT INTO `pelanggan`(`PelangganID`,`NamaPelanggan`, `Alamat`, `NomorTelepon`) VALUES('$PelangganID','$NamaPelanggan','$Alamat','$NomorTelepon')")) {
//     echo("Error description: " . $koneksi -> error);
// }
// if (!$koneksi -> query("INSERT INTO `penjualan`(`TanggalPenjualan`,`PelangganID`)  VALUES ('$TanggalPenjualan','$PelangganID')")) {
//     echo("Error description: " . $koneksi -> error);
// }
// mengalihkan halaman kembali ke data_barang.php
header("location:pembelian.php?pesan=simpan");

?>