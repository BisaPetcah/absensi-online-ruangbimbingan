<?php
    session_start();
    require "aksi/config.php";
    include "aksi/functionClass.php";

    //Seleksi Data
    $level = $_SESSION['level'];
    
    if($_SESSION['level'] == "Guru") {
        $id_akun = $_SESSION['id_akunLogin'];
        $username = $_SESSION['username'];
        $result = profileGuru($conn, $username);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title>Daily Report | Catatan</title>
    <link rel="stylesheet" href="vendors/feather/feather.css"/>
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css"/>
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css"/>
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css"/>
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css"/>
    <link rel="stylesheet" href="css/vertical-layout-light/style.css"/>
    <link rel="shortcut icon" href="images/favicon.png"/>
</head>
<body>
<div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="index.php"><img src="images/logo.png" class="mr-2" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.php"><img src="images/logo.png" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <ul class="navbar-nav" style="margin-left: auto">
                <li class="nav-item d-none d-lg-block">
                    <h5>
                        <a href="aksi/logout.php">
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
            <img src="<?= $result['foto_profile']?>" width="120px" height="120px" alt="profile"/>
                <h4 class="mt-3"><?= $result['nama']?></h4>
                <h5 class="text-primary"><?= $result['level']?></h5>
            </div>
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
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
                <li class="nav-item active">
                    <a class="nav-link" href="catatan.php">
                        <i class="mdi mdi-checkbox-marked-outline menu-icon"></i>
                        <span class="menu-title">Catatan</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#riwayat" aria-expanded="false" aria-controls="kelas">
                        <i class="mdi mdi-account-multiple menu-icon"></i>
                        <span class="menu-title">Riwayat</span>
                        <i class="menu-arrow"></i>
                    </a>
                    <div class="collapse" id="riwayat">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"><a class="nav-link" href="riwayat/riwayat-absen.php"> Riwayat Absen </a></li>
                            <li class="nav-item"><a class="nav-link" href="riwayat/riwayat-catatan.php"> Riwayat Catatan </a></li>
                        </ul>
                    </div>
                </li>
                <hr class="d-lg-none" style="border: 1px solid #0066cc; width: 75%"/>
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
                                <h4 class="card-title">Catatan</h4>
                                <form method="POST" class="form">
                                    <div class="form-group">
                                        <label for="exampleInputName1">Tanggal</label>
                                        <input type="date" class="form-control" id="exampleInputName1" value="<?= date('Y-m-d', time()+60*60*7)?>" name="tanggal"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleTextarea1">Catatan</label>
                                        <textarea class="form-control" id="exampleTextarea1" rows="5" placeholder="Masukkan catatan" name="isi"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2" name="tambah">Tambah</button>
                                    <button class="btn btn-light">Kembali</button>
                                </form>
                                <?php 
                                    if(isset($_POST['tambah'])){
                                        echo catatanGuru($conn, $_POST, $id_akun);
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
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
<script src="vendors/js/vendor.bundle.base.js"></script>
<script src="vendors/datatables.net/jquery.dataTables.js"></script>
<script src="vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/template.js"></script>
</body>
</html>
