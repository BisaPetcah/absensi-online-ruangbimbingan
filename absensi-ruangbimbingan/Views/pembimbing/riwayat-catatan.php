<?php
session_start();
require "../../Action/config.php";
include "../../Models/helper/template.php";
include "../../Models/helper/function.php";

$id_user = $_SESSION['user_id'];
$user_roleid = $_SESSION['user_roleid'];
$profile = profileUser($conn, $id_user);
headMain($tittle = "Daily Report | Tambah Siswa", $href = baseURL);
?>
<div class="container-scroller">
	<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
		<div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
			<a class="navbar-brand brand-logo" href="../index.php"><img src="../images/logo.png" class="mr-2" alt="logo" /></a>
			<a class="navbar-brand brand-logo-mini" href="../index.php"><img src="../images/logo.png" alt="logo" /></a>
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
						<a href="../aksi/logout.php">
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
                        <img src="<?= baseURL.$profile['profile_foto']?>" width="120px" height="120px" alt="profile" />
                        </div>
                    </div>
                    <h4 class="mt-1"><?= $profile['profile_nama']?></h4>
                    <h5 class="text-primary">Pembimbing</h5>
                    <a class="btn btn-primary btn-sm mt-2" href="">Ubah Profile</a>
            </div>
			<ul class="nav">
				<li class="nav-item">
					<a class="nav-link" href="../index.php">
						<i class="icon-grid menu-icon"></i>
						<span class="menu-title">Dashboard</span>
					</a>
				</li>
				<?php if ($_SESSION['level'] == "Guru") : ?>
					<li class="nav-item">
						<a class="nav-link" data-toggle="collapse" href="#siswa" aria-expanded="false" aria-controls="siswa">
							<i class="mdi mdi-account-multiple menu-icon"></i>
							<span class="menu-title">Siswa</span>
							<i class="menu-arrow"></i>
						</a>
						<div class="collapse" id="siswa">
							<ul class="nav flex-column sub-menu">
								<li class="nav-item"><a class="nav-link" href="../siswa/daftar.php"> Daftar Siswa </a></li>
								<li class="nav-item"><a class="nav-link" href="../siswa/tambah.php"> Tambah Siswa </a></li>
							</ul>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="collapse" href="#kelas" aria-expanded="false" aria-controls="kelas">
							<i class="mdi mdi-account-multiple menu-icon"></i>
							<span class="menu-title">Kelas</span>
							<i class="menu-arrow"></i>
						</a>
						<div class="collapse" id="kelas">
							<ul class="nav flex-column sub-menu">
								<li class="nav-item"><a class="nav-link" href="../kelas/daftar.php"> Daftar Kelas </a></li>
								<li class="nav-item"><a class="nav-link" href="../kelas/tambah.php"> Tambah Kelas </a></li>
							</ul>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../absensi.php">
							<i class="mdi mdi-account-check menu-icon"></i>
							<span class="menu-title">Absensi</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="../catatan.php">
							<i class="mdi mdi-checkbox-marked-outline menu-icon"></i>
							<span class="menu-title">Catatan</span>
						</a>
					</li>
				<?php endif; ?>
				<li class="nav-item active">
					<a class="nav-link" data-toggle="collapse" href="#riwayat" aria-expanded="false" aria-controls="kelas">
						<i class="mdi mdi-account-multiple menu-icon"></i>
						<span class="menu-title">Riwayat</span>
						<i class="menu-arrow"></i>
					</a>
					<div class="collapse show" id="riwayat">
						<ul class="nav flex-column sub-menu">
							<li class="nav-item"><a class="nav-link" href="riwayat-absen.php"> Riwayat Absen </a></li>
							<li class="nav-item"><a class="nav-link" href="riwayat-catatan.php"> Riwayat Catatan </a></li>
						</ul>
					</div>
				</li>
				<hr class="d-lg-none" style="border: 1px solid #0066cc; width: 75%" />
				<li class="nav-item d-lg-none">
					<a class="nav-link" href="../aksi/logout.php">
						<i class="ti-power-off menu-icon"></i>
						<span class="menu-title">Keluar</span>
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
								<div class="card-title">Riwayat</div>
								<div class="row d-flex justify-content-center align-items-center mt-3">
									<div class="col">
										<h5>Catatan</h5>
									</div>
									<div class="col-md-5 col-lg-4">
										<div class="form-group">
											<div class="input-group">
												<input type="date" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username">
												<div class="input-group-append">
													<button class="btn btn-sm btn-primary" type="button">Search</button>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="table-responsive">
									<table class="table table-striped">
										<thead>
											<tr>
												<th class="w-auto">Tanggal</th>
												<th>Nama</th>
												<th>Catatan</th>
											</tr>
										</thead>
										<tbody>
											<!-- Session Admin -->
											<?php if ($_SESSION['level'] == "Admin") : ?>
												<?php while ($data = mysqli_fetch_assoc($riwayatCatatan)) : ?>
													<tr>
														<th><?= $data['tanggal'] ?></th>
														<th><?= $data['nama'] ?></th>
														<td>
															<p><?= $data['isi'] ?></p>
														</td>
													</tr>
												<?php endwhile; ?>
											<?php endif; ?>
											<!-- Session Guru -->
											<?php if ($_SESSION['level'] == "Guru") : ?>
												<?php while ($data = mysqli_fetch_assoc($riwayatCatatan)) : ?>
													<tr>
														<th><?= $data['tanggal'] ?></th>
														<th><?= $data['nama'] ?></th>
														<td>
															<p><?= $data['isi'] ?></p>
														</td>
													</tr>
												<?php endwhile; ?>
											<?php endif; ?>
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
					<span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021 All rights reserved.</span>
					<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
				</div>
			</footer>
		</div>
	</div>
	<script src="<?= baseURL ?>Assets/vendors/js/vendor.bundle.base.js"></script>
	<script src="<?= baseURL ?>Assets/vendors/datatables.net/jquery.dataTables.js"></script>
	<script src="<?= baseURL ?>Assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
	<script src="<?= baseURL ?>Assets/js/off-canvas.js"></script>
	<script src="<?= baseURL ?>Assets/js/hoverable-collapse.js"></script>
	<script src="<?= baseURL ?>Assets/js/template.js"></script>
	<script src="<?= baseURL ?>Assets/js/dashboard.js"></script>
	</body>

	</html>