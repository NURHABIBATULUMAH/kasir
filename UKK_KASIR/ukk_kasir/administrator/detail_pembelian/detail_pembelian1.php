<?php 
session_start();

	// cek apakah yang mengakses halaman ini sudah login
if($_SESSION['level']==""){
	header("location:../../index.php?pesan=gagal");
}

error_reporting(E_ALL);
ini_set('display_errors', 1); 

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>index</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="../index1.php">Dashboard</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-6">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <a class="nav-link" href="../index1.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                              Menu
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../barang/data_barang1.php">Data Barang</a>
                                    <a class="nav-link" href="../pembelian/pembelian1.php">Data Pembelian</a>
                                    <a class="nav-link" href="../petugas/data_pengguna1.php">Data Pengguna</a>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Logout</div>
                            <a class="nav-link" href="../../logout.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                              Logout
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="#"></a>
                                            <a class="nav-link" href="#"></a>
                                            <a class="nav-link" href="#"></a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                </nav>
            </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid">
            <h1 class="mt-4">List Detail Pembelian</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Detail Pembelian</li>
            </ol>

            <div class="card mt-2">
	<div class="card-body">
		
		<?php 
		include '../../koneksi.php';
		$PelangganID = $_GET['PelangganID'];
		$no = 1;
		$data = mysqli_query($koneksi,"SELECT * FROM pelanggan INNER JOIN penjualan ON pelanggan.PelangganID=penjualan.PelangganID");
		while($d = mysqli_fetch_array($data)){
			?>
			<?php if ($d['PelangganID'] == $PelangganID) { ?>
				<table>
					<tr>
						<td>ID Pelanggan</td>
						<td>: <?php echo $d['PelangganID']; ?></td>
					</tr>
					<tr>
						<td>Nama Pelanggan</td>
						<td>: <?php echo $d['NamaPelanggan']; ?></td>
					</tr>
					<tr>
						<td>No. Telepon</td>
						<td>: <?php echo $d['NomorTelepon']; ?></td>
					</tr>
					<tr>
						<td>Alamat</td>
						<td>: <?php echo $d['Alamat']; ?></td>
					</tr>
					<tr>
						<td>Total Pembelian</td>
						<td>: Rp. <?php echo $d['TotalHarga']; ?></td>
					</tr>
				</table>
				<br>
				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Produk</th>
							<th>Jumlah Beli</th>
							<th>Total Harga</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						include '../../koneksi.php';
						$nos = 1;
						$detailpenjualan = mysqli_query($koneksi,"SELECT * FROM detailpenjualan");
						while($d_detailpenjualan = mysqli_fetch_array($detailpenjualan)){
							?>
							<?php 
							if ($d_detailpenjualan['PenjualanID'] == $d['PenjualanID']) { ?>
								<tr>
									<td><?php echo $nos++; ?></td>
									<td>
										<form action="simpan_barang_beli.php" method="post">
											<div class="form-group">
												<input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
												<input type="text" name="DetailID" value="<?php echo $d_detailpenjualan['DetailID']; ?>" hidden>
												<select name="ProdukID" class="form-control" onchange="this.form.submit()">
													<?php 
													include '../../koneksi.php';
													$no = 1;
													$produk = mysqli_query($koneksi,"SELECT * FROM produk");
													while($d_produk = mysqli_fetch_array($produk)){
														?>
														<option value="<?php echo $d_produk['ProdukID']; ?>" disabled <?php if ($d_produk['ProdukID']==$d_detailpenjualan['ProdukID']) { echo "selected"; } ?>><?php echo $d_produk['NamaProduk']; ?></option>
													<?php } ?>
												</select>
											</div>
										</form>
									</td>
									<td>
											<?php 
											include '../../koneksi.php';
											$produk = mysqli_query($koneksi,"SELECT * FROM produk");
											while($d_produk = mysqli_fetch_array($produk)){
												?>
												<?php 
												if ($d_produk['ProdukID']==$d_detailpenjualan['ProdukID']) { ?>
													<input type="text" name="Harga" value="<?php echo $d_produk['Harga']; ?>" hidden>
													<input type="text" name="ProdukID" value="<?php echo $d_produk['ProdukID']; ?>" hidden>
													<input type="text" name="Stok" value="<?php echo $d_produk['Stok']; ?>" hidden>
													<?php 
												}
											}
											?>
											<div class="form-group">
												<input type="number" name="JumlahProduk" value="<?php echo $d_detailpenjualan['JumlahProduk']; ?>" disabled class="form-control">
											</div>
										</td>
										<td><?php echo $d_detailpenjualan['Subtotal']; ?></td>
										<td>
											<input type="text" name="DetailID" value="<?php echo $d_detailpenjualan['DetailID']; ?>" hidden>
											<input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
										</form>
										<form method="post" action="hapus_detail_pembelian.php">
											<input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
											<input type="text" name="DetailID" value="<?php echo $d_detailpenjualan['DetailID']; ?>" hidden>
										</form>
									</td>
								</tr>
							<?php } else {
								?>
								<?php 
							}
						} 
						?>
					</tbody>
				</table>
					<?php 
					include '../../koneksi.php';
					$detailpenjualan = mysqli_query($koneksi, "SELECT SUM(Subtotal) AS TotalHarga FROM detailpenjualan WHERE 	PenjualanID='$d[PenjualanID]'"); 
					$row = mysqli_fetch_assoc($detailpenjualan); 
					$sum = $row['TotalHarga'];
					?>
					<div class="row">
						<div class="col-sm-10">
							<div class="form-group">
								<input type="text" class="form-control" name="TotalHarga" value="<?php echo $sum; ?>">
								<input type="text" name="PelangganID" value="<?php echo $d['PelangganID']; ?>" hidden>
								<input type="text" name="PenjualanID" value="<?php echo $d['PenjualanID']; ?>" hidden>
							</div>
						</div>
					</div>
				</form>
			<?php } else { ?>
				<?php 
			} 
		} 
		?>		
	</div>
</div>
</div>
	</div>
</div>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"></script>
    </body>
</html>
