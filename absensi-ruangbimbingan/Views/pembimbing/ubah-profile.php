<?php
session_start();
require "../../Action/config.php";
include "../../Models/helper/template.php";
include "../../Models/helper/function.php";

$id_user = $_SESSION['user_id'];
$user_roleid = $_SESSION['user_roleid'];
$profile = profileUser($conn, $id_user);
headMain($tittle = "Daily Report | Ubah Profile", $href = baseURL);
?>
<div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="index.php"><img src="<?= baseURL ?>/Assets/images/logo.png" class="mr-2" alt="logo" /></a>
            <a class="navbar-brand brand-logo-mini" href="index.php"><img src="<?= baseURL ?>/Assets/images/logo.png" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
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
                        <img src="<?= baseURL . $profile['profile_foto'] ?>" width="120px" height="120px" alt="profile" />
                    </div>
                </div>
                <h4 class="mt-1"><?= $profile['profile_nama'] ?></h4>
                <h5 class="text-primary">Pembimbing</h5>
                <a class="btn btn-primary btn-sm mt-2" href="ubah-profile.php">Ubah Profile</a>
            </div>
            <ul class="nav">
                <li class="nav-item active">
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
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#siswa" aria-expanded="false" aria-controls="siswa">
                        <i class="mdi mdi-account-multiple menu-icon"></i>
                        <span class="menu-title">Siswa</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="siswa">
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
                    <a class="nav-link" data-toggle="collapse" href="#riwayat" aria-expanded="false" aria-controls="siswa">
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
                    <a class="nav-link" href="<?= baseURL?>Models/helper/logout.php">
                        <i class="ti-power-off menu-icon"></i>
                        <span class="menu-title">Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ubah Profile</h4>
                                <!-- Awal Form Register Guru -->
                                <form action="<?= baseURL ?>/Models/helper/register/register-pembimbing.php" enctype="multipart/form-data" method="POST" class="form">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Nama</label>
                                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Nama" name="nama" value="<?= $data['profile_nama'] ?>" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail2">Username</label>
                                        <input type="text" class="form-control" id="exampleInputEmail2" placeholder="Username" name="username" value="<?= $data['user_username'] ?>" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail3">Email</label>
                                        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" name="email" value="<?= $data['user_email'] ?>" required />
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputAddress">Alamat</label>
                                        <textarea type="text" class="form-control" id="exampleInputAddress" placeholder="Alamat" name="alamat" required><?= $data['profile_alamat'] ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputNumber">No HP</label>
                                        <input type="number" class="form-control" id="exampleInputNumber" placeholder="No HP" name="noHp" value="<?= $data['profile_noHp'] ?>" required />
                                    </div>
                                    <div class="form-group">
                                        <label>File upload</label>
                                        <input type="file" id="upload_foto" name="foto_profile" class="file-upload-default" />
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled placeholder="Tambahkan Foto Profile" value="<?php $data['profile_foto'] ?>" required />
                                            <span class="input-group-append">
                                                <button for="upload_foto" class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                            </span>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2 mt-4" name="tambah">Tambah</button>
                                </form>
                                <!-- Akhir Form Register Guru -->
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
</div>
<script src="<?= baseURL ?>Assets/vendors/js/vendor.bundle.base.js"></script>
<script src="<?= baseURL ?>Assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="<?= baseURL ?>Assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="<?= baseURL ?>Assets/js/off-canvas.js"></script>
<script src="<?= baseURL ?>Assets/js/hoverable-collapse.js"></script>
<script src="<?= baseURL ?>Assets/js/template.js"></script>
<script src="<?= baseURL ?>Assets/js/file-upload.js"></script>
</body>

</html>