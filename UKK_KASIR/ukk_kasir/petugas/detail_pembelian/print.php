
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1); 

date_default_timezone_set("Asia/Jakarta");
$tanggalSekarang = date("Y-m-d");
  $jamSekarang = date("h:i a");

	
  include '../../koneksi.php';

if (isset($_POST['print'])) {
	
	$TotalHarga = $_POST['TotalHarga'];
	$bayar = $_POST['bayar'];
	$kembalian = $_POST['kembalian'];

	
}

 ?>

 <center>
 	Terima kasih telah belanja di Toko Kami <br>
 	berikut adalah bukti pembayaran belanjaan anda <br>
 	Tanggal : <?= $tanggalSekarang; ?><br>
 	Jam : <?=$jamSekarang;?>
 	. <br><br>

 	<table border="1">
 		<thead>
 			<td>Nama Produk</td>
 			<td>Jumlah Beli</td>
 			<td>Total Harga</td>
 		</thead>
        
 		<?php 
		include '../../koneksi.php';
        $select = mysqli_query($koneksi, "SELECT NamaProduk,JumlahProduk,Subtotal FROM detailpenjualan INNER JOIN produk ON detailpenjualan.ProdukID=produk.ProdukID");

        foreach ($select as $key):

        ?>


 		<tbody>
 			<tr>
 				<td><?php echo $key['NamaProduk']; ?></td>
 				<td><?php echo $key['JumlahProduk']; ?></td>
 				<td><?php echo $key['Subtotal'];?></td>
                 <?php endforeach; ?>
 			</tr>
 		</tbody>
 	</table>

 	<p>Total : <?=($TotalHarga); ?></p>
 	<p>Bayar : <?=($bayar); ?></p>
 	<p>Kembalian : <?=($kembalian); ?></p><br>


 </center>
 <script type="text/javascript">
 	window.print();
 </script>
 <script>
			$("#bayar").click(function() {
				$('[name="kembalian"]').val($('[name="bayar"]').val() - $('[name="TotalHarga"]').val())
			});
</script>