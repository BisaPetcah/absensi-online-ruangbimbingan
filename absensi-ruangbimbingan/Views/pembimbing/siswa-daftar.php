<?php
session_start();
require "../../Action/config.php";
include "../../Models/helper/template.php";
include "../../Models/helper/function.php";

$id_user = $_SESSION['user_id'];
$user_roleid = $_SESSION['user_roleid'];
$profile = profileUser($conn, $id_user);
headMain($tittle = "Daily Report | Siswa Daftar", $href = baseURL);
$daftarSiswa = daftarSiswa($conn, $id_user);
?>
<div class="container-scroller">
	<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
		<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
			<a class="navbar-brand brand-logo" href="index.php"><img src="
<?= baseURL ?>Assets/images/logo.png" class="mr-2" alt="logo" /></a>
			<a class="navbar-brand brand-logo-mini" href="index.php"><img src="
<?= baseURL ?>Assets/images/logo.png" alt="logo" /></a>
		</div>
		<div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
			<ul class="navbar-nav mr-lg-2">
				<li class="nav-item nav-search d-none d-lg-block">
					<div class="input-group">
						<div class="input-group-prepend hover-cursor" id="navbar-search-icon">
							<span class="input-group-text" id="search">
								<i class="icon-search"></i>
							</span>
						</div>
						<input type="text" class="form-control" id="navbar-search-input" placeholder="Search now" aria-label="search" aria-describedby="search" />
					</div>
				</li>
			</ul>
			<ul class="navbar-nav" style="margin-left: auto">
				<li class="nav-item d-none d-lg-block">
					<h5>
						<a href="<?= baseURL ?>Models/helper/logout.php">
							<i class="ti-power-off text-danger menu-icon"></i>
							<span class="menu-title">Keluar</span>
						</a>
					</h5>
				</li>
			</ul>
			<button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
				<span class="icon-menu"></span>
			</button>
		</div>
	</nav>
	<div class="container-fluid page-body-wrapper">
		<nav class="sidebar sidebar-offcanvas" id="sidebar">
			<div class="profile text-center mt-4">
				<div class="row">
					<div class="col">
						<img src="<?= baseURL . $profile['profile_foto'] ?>" width="120px" height="120px" alt="profile" />
					</div>
				</div>
				<h4 class="mt-1"><?= $profile['profile_nama'] ?></h4>
				<h5 class="text-primary">Pembimbing</h5>
				<a class="btn btn-primary btn-sm mt-2" href="ubah-profile.php">Ubah Profile</a>
			</div>
			<ul class="nav">
				<li class="nav-item	">
					<a class="nav-link" href="index.php">
						<i class="icon-grid menu-icon"></i>
						<span class="menu-title">Dashboard</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="collapse" href="#program" aria-expanded="false" aria-controls="program">
						<i class="mdi mdi-account-multiple menu-icon"></i>
						<span class="menu-title">Program</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="collapse" id="program">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item"><a class="nav-link" style="font-size:12px" href="program-daftar.php"> Daftar Program </a></li>
							<li class="nav-item"><a class="nav-link" style="font-size:12px" href="program-tambah.php"> Tambah Program</a></li>
						</ul>
					</div>
				</li>
				<li class="nav-item active">
					<a class="nav-link" data-toggle="collapse" href="#siswa" aria-expanded="false" aria-controls="siswa">
						<i class="mdi mdi-account-multiple menu-icon"></i>
						<span class="menu-title">Siswa</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="collapse show" id="siswa">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item"><a class="nav-link" style="font-size:12px" href="siswa-daftar.php">
									Daftar Siswa </a></li>
							<li class="nav-item"><a class="nav-link" style="font-size:12px" href="siswa-tambah.php">
									Tambah Siswa </a></li>
						</ul>
					</div>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="absensi.php">
						<i class="mdi mdi-account-check menu-icon"></i>
						<span class="menu-title">Absensi</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="catatan.php">
						<i class="mdi mdi-checkbox-marked-outline menu-icon"></i>
						<span class="menu-title">Catatan</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="collapse" href="#riwayat" aria-expanded="false" aria-controls="riwayat">
						<i class="mdi mdi-account-multiple menu-icon"></i>
						<span class="menu-title">Riwayat</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="collapse" id="riwayat">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item"><a class="nav-link" style="font-size:12px" href="riwayat-absen.php"> Riwayat Absen </a></li>
							<li class="nav-item"><a class="nav-link" style="font-size:12px" href="riwayat-catatan.php"> Riwayat Catatan </a></li>
						</ul>
					</div>
				</li>
				<hr class="d-lg-none" style="border: 1px solid #0066cc; width: 75%" />
				<li class="nav-item d-lg-none">
					<a class="nav-link" href="#">
						<i class="ti-power-off menu-icon"></i>
						<span class="menu-title">Logout</span>
					</a>
				</li>
			</ul>
		</nav>
		<div class="main-panel">
			<div class="content-wrapper">
				<div class="row">
					<div class="col">
						<div class="card">
							<div class="card-body">
								<div class="card-title">Daftar Siswa</div>
								<div class="d-lg-none">
									<div class="form-group">
										<div class="input-group">
											<input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" autofocus />
											<div class="input-group-append">
												<button class="btn btn-sm btn-primary" type="button">Search</button>
											</div>
										</div>
									</div>
								</div>
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Foto</th>
												<th>Nama</th>
												<th>Alamat</th>
												<th>No HP</th>
												<th class="text-center" width="100">Aksi</th>
											</tr>
										</thead>
										<tbody>
											<?php while ($data = mysqli_fetch_assoc($daftarSiswa)) : ?>
												<tr>
													<td><img src="<?= baseURL . $data['profile_foto'] ?>" alt="" /></td>
													<td><?= $data['profile_nama'] ?></td>
													<td><?= $data['profile_alamat'] ?></td>
													<td><?= $data['profile_noHp'] ?></td>
													<td>
														<div class="btn-group">
															<a class="btn btn-warning btn-sm btn-icon-text" href="siswa-edit.php?id=<?= $data['user_id'] ?>">Edit<i class="mdi mdi-pencil btn-icon-append"></i></a>
															<a class="btn btn-danger btn-sm btn-icon-text" href="aksi/guru/deleteSiswa.php?id=<?= $data['user_id'] ?>">Hapus<i class="mdi mdi-delete btn-icon-append"></i></a>
														</div>
													</td>
												</tr>
											<?php endwhile; ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer">
				<div class="d-sm-flex justify-content-center justify-content-sm-between">
					<span class="text-muted text-center text-sm-left d-block d-sm-inline-block"> Copyright ?? 2021 All rights reserved.</span>
					<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
				</div>
			</footer>
		</div>
	</div>
</div>
<script src="<?= baseURL ?>Assets/vendors/js/vendor.bundle.base.js"></script>
<script src="<?= baseURL ?>Assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="<?= baseURL ?>Assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="<?= baseURL ?>Assets/vendors/select2/select2.min.js"></script>
<script src="<?= baseURL ?>Assets/js/off-canvas.js"></script>
<script src="<?= baseURL ?>Assets/js/hoverable-collapse.js"></script>
<script src="<?= baseURL ?>Assets/js/template.js"></script>
<script src="<?= baseURL ?>Assets/js/file-upload.js"></script>
<script src="<?= baseURL ?>Assets/js/select2.js"></script>
</body>

</html>