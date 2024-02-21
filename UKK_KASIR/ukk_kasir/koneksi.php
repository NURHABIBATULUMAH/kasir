<?php 
$koneksi = mysqli_connect("localhost","habiba","140306","ukk_kasir");

// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>