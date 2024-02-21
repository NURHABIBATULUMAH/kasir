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
        <title>data barang</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Dashboard</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            
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
                            <div class="sb-sidenav-menu-heading">Petugas</div>
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
                                    <a class="nav-link" href="../barang/data_barang.php">Data Barang</a>
                                    <a class="nav-link" href="../pembelian/pembelian.php">Data Pembelian</a>
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
            <h1 class="mt-4">List Data Barang</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Data Barang</li>
            </ol>
            
<div class="card mt-2">
	<div class="card-body">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
		Tambah data
		</button>
	</div>
	<div class="card-body">
		<?php 
		if(isset($_GET['pesan'])){
			if($_GET['pesan']=="simpan"){?>
				<div class="alert alert-success" role="alert">
					Data Berhasil Di Simpan
				</div>
			<?php } ?>
			<?php if($_GET['pesan']=="update"){?>
				<div class="alert alert-success" role="alert">
					Data Berhasil Di Update
				</div>
			<?php } ?>
			<?php if($_GET['pesan']=="hapus"){?>
				<div class="alert alert-success" role="alert">
					Data Berhasil Di Hapus
				</div>
			<?php } ?>
			<?php 
		}
		?>
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Produk</th>
					<th>Harga</th>
					<th>Stok</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				include '../../koneksi.php';
				$no = 1;
				$data = mysqli_query($koneksi,"select * from produk");
				while($d = mysqli_fetch_array($data)){
					?>
					<tr>
						<td><?php echo $no++; ?></td>
						<td><?php echo $d['NamaProduk']; ?></td>
						<td>Rp. <?php echo $d['Harga']; ?></td>
						<td><?php echo $d['Stok']; ?></td>
						<td>
						<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalCenter<?php echo $d['ProdukID']; ?>">
						<i class="fa fa-edit"></i>
						</button>
							  <!-- <div >	 -->
                              <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus-kat<?php echo $d['ProdukID']; ?>" title="Hapus">
                              <i class="fa fa-trash"></i>
                              </button>
                              <!-- </div> -->
						</td>
					</tr>

					<!-- Modal Edit Data-->
					<div class="modal fade" id="exampleModalCenter<?php echo $d['ProdukID']; ?>" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered" role="document">
    					<div class="modal-content">
      						<div class="modal-header">
        						<h5 class="modal-title" id="exampleModalLongTitle">Edit Data Barang</h5>
        					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          						<span aria-hidden="true">&times;</span>
        					</button>
      					</div>
								<form action="proses_update_barang.php" method="post">
									<div class="modal-body">
										<div class="form-group">
											<label>Nama Produk</label>
											<input type="hidden" name="ProdukID" value="<?php echo $d['ProdukID']; ?>">
											<input type="text" name="NamaProduk" class="form-control" value="<?php echo $d['NamaProduk']; ?>">
										</div>
										<div class="form-group">
											<label>Harga Produk</label>
											<input type="number" name="Harga" class="form-control" value="<?php echo $d['Harga']; ?>">
										</div>
										<div class="form-group">
											<label>Stok Produk</label>
											<input type="number" name="Stok" class="form-control" value="<?php echo $d['Stok']; ?>">
										</div>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Update</button>
									</div>
								</form>
							</div>
						</div>
					</div>

					<!-- Modal Hapus Data-->
					<form method="post" action="proses_hapus_barang.php">
					<div class="modal fade" id="hapus-kat<?php echo $d['ProdukID']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
					<div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                        
                          <b><p class="modal-title" id="hapus-kat<?php echo $d['ProdukID'] ?>"></p></b>
                        </div>
						  <div class="modal-body">
									<div class="modal-body">
										<input type="hidden" name="ProdukID" value="<?php echo $d['ProdukID']; ?>">
										Apakah anda yakin akan menghapus data <b><?php echo $d['NamaProduk']; ?></b>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<button type="submit" class="btn btn-primary">Hapus</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>

<!-- Modal Tambah Data-->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
			<form action="proses_simpan_barang.php" method="post">
				<div class="modal-body">				
					<div class="form-group">
						<label>Nama Produk</label>
						<input type="text" name="NamaProduk" class="form-control">
					</div>
					<div class="form-group">
						<label>Harga Produk</label>
						<input type="number" name="Harga" class="form-control">
					</div>
					<div class="form-group">
						<label>Stok Produk</label>
						<input type="number" name="Stok" class="form-control">
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
					<button type="submit" class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>
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
