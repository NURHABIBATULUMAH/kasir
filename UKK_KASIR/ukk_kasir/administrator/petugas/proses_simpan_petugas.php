<?php 
// koneksi database
include '../../koneksi.php';

// menangkap data yang di kirim dari form
$nama_petugas = $_POST['nama_petugas'];
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];

// menginput data ke database
mysqli_query($koneksi,"INSERT INTO `petugas`(`nama_petugas`, `username`, `password`, `level`) values ('$nama_petugas','$username','$password','$level')");

// mengalihkan halaman kembali ke data_barang.php
header("location:data_pengguna1.php?pesan=simpan");

?>