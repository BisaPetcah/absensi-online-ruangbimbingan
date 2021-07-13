<?php
session_start();
require "../../Action/config.php";
include "../../Models/helper/template.php";
include "../../Models/helper/function.php";

$id_user = $_SESSION['user_id'];
$user_roleid = $_SESSION['user_roleid'];
$profile = profileUser($conn, $id_user);
headMain($tittle = "Daily Report | Absen Detail", $href = baseURL);
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
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                <span class="icon-menu"></span>
            </button>
        </div>
    </nav>
    <div class="container-fluid page-body-wrapper">
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <div class="profile text-center mt-4">
                <img src="../<?=$result['foto_profile']?>" width="120px" height="120px" alt="profile"/>
                <h4 class="mt-3"><?=$result['nama']?></h4>
                <h5 class="text-primary"><?=$result['level']?></h5>
            </div>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <?php if ($_SESSION['level'] == "Admin"): ?>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#guru" aria-expanded="false" aria-controls="guru">
                        <i class="mdi mdi-account-multiple menu-icon"></i>
                        <span class="menu-title">Guru</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="guru">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="../guru/daftar.php"> Daftar Guru </a></li>
                            <li class="nav-item"><a class="nav-link" href="guru/tambah.php"> Tambah Guru </a></li>
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
                            <li class="nav-item"><a class="nav-link" href="siswa/daftar.php"> Daftar Siswa </a></li>
                            <li class="nav-item"><a class="nav-link" href="siswa/tambah.php"> Tambah Siswa </a></li>
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
                            <li class="nav-item"><a class="nav-link" href="kelas/daftar.php"> Daftar Kelas </a></li>
                            <li class="nav-item"><a class="nav-link" href="kelas/tambah.php"> Tambah Kelas </a></li>
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
                <?php endif;?>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#riwayat" aria-expanded="false" aria-controls="kelas">
                        <i class="mdi mdi-account-multiple menu-icon"></i>
                        <span class="menu-title">Riwayat</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="riwayat">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="riwayat-absen.php"> Riwayat Absen </a></li>
                            <li class="nav-item"><a class="nav-link" href="riwayat-catatan.php"> Riwayat Catatan </a></li>
                        </ul>
                    </div>
                </li>
                <hr class="d-lg-none" style="border: 1px solid #0066cc; width: 75%"/>
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
            <!-- FORM ISI DATA -->
                <form>
                <div class="row">
                        <div class="col">
                            <div class="card mb-6">
                                <div class="card-body">
                                    <h4 class="card-title">Kegiatan Guru</h4>
                                    <div class="form-group">
                                        <label for="tanggal-kegiatan">Tanggal Kegiatan</label>
                                        <input type="date" disabled class="form-control" id="tanggal-kegiatan" value="<?= $data['tanggal']?>"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama-kegiatan">Kegiatan</label>
                                        <input type="text" disabled class="form-control" id="nama-kegiatan" value="<?= $data['nama_kegiatan']?>"/>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label for="waktu-mulai">Waktu Mulai</label>
                                                <input type="time" disabled class="form-control" id="waktu-mulai" value="<?=  date("H:i", date_default_timezone_set('Asia/Jakarta')+time())?>">
                                            </div>
                                            <div class="col">
                                                <label for="kelas">Waktu Selesai</label>
                                                <input type="time" disabled class="form-control" id="waktu-selesai" name="waktu-selesai">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">Absensi Siswa</div>
                                    <div class="form-group">
                                        <label for="kelas">Pilih Nama Kelas :</label>
                                        <div class="row">
                                            <div class="col">
                                                <select class="js-example-basic-single w-50" name="id_kelas" id="id_kelas">
                                                <option value="" disabled selected>Pilih Kelas</option>
                                                <?php foreach ($daftarKelas as $data): ?>
                                                <option value="<?=$data['id_kelas']?>"><?=$data['nama_kelas']?></option>
                                                <?php endforeach?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="content" class="table-responsive">
                                <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th class="text-center" style="min-width: 150px">Kehadiran</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                        <td><img src="${data.foto_profile}" alt="${data.nama_siswa}"/></td>
                        <td>${data.nama_siswa}</td>
                        <div class="form-group">
                            <td class="d-none d-lg-flex justify-content-between d-xs-none">
                                        <label class="form-check-label" for="hadir-${data.id_siswa}">
                                        <input type="radio" class="form-check-input" name="kehadiran[${data.id_siswa}]" id="hadir-${data.id_siswa}" value="Hadir"/>
                                        Hadir
                                        </label>
                                        <label class="form-check-label" for="izin-${data.id_siswa}">
                                        <input type="radio" class="form-check-input" name="kehadiran[${data.id_siswa}]" id="izin-${data.id_siswa}" value="Izin"/>
                                        Izin
                                        </label>
                                        <label class="form-check-label" for="alpha-${data.id_siswa}">
                                        <input type="radio" class="form-check-input" name="kehadiran[${data.id_siswa}]" id="alpha-${data.id_siswa}" value="Alpha"/>
                                        Alpha
                                        </label>
                                        <div class="form-check-danger">
                                        <label class="form-check-label" for="alpha-${data.id_siswa}">
                                            <input type="radio" class="form-check-input" name="kehadiran[${data.id_siswa}]" id="sakit-${data.id_siswa}" value="Sakit"/>
                                            Sakit
                                        </label>
                                    </div>
                            </td>
                            <td class="d-lg-none" style="min-width: 150px">
                                <select class="form-control" name="kehadiran[${data.id_siswa}]">
                                    <option value="" selected disabled>Masukkan Kehadiran</option>
                                    <option value="Hadir">Hadir</option>
                                    <option value="Alpha">Alpha</option>
                                    <option value="Izin">Izin</option>
                                    <option value="Sakit">Sakit</option>
                                </select>
                            </td>
                        </div>
                    </tr>
                    </tbody>
                    </table>
                    <div class="form-group">
                    <label>Bukti Foto</label>
                        <!-- <img src="" alt="foto_bukti"> -->
                    </div>
                    <div class="form-group mt-3 text-lg-right">
                        <button type="submit" class="btn btn-primary mr-2">Print</button>
                        <a class="btn btn-light" href="riwayat.php">Kembali</a>
                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021 All rights reserved.</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                            class="ti-heart text-danger ml-1"></i></span>
                </div>
            </footer>
        </div>
    </div>
</div>

<script src="<?= baseURL?>Assets/vendors/js/vendor.bundle.base.js"></script>
<script src="<?= baseURL?>Assets/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="<?= baseURL?>Assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="<?= baseURL?>Assets/js/off-canvas.js"></script>
<script src="<?= baseURL?>Assets/js/hoverable-collapse.js"></script>
<script src="<?= baseURL?>Assets/js/template.js"></script>
<script src="<?= baseURL?>Assets/js/ajax.js"></script>
<script src="<?= baseURL?>Assets/js/absensi.js"></script>
</body>
</html>
