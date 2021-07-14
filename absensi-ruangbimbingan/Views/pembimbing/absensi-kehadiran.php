<?php
session_start();
require "../../Action/config.php";
include "../../Models/helper/template.php";
include "../../Models/helper/function.php";

$id_user = $_SESSION['user_id'];
$id_program = $_GET['id'];
$user_roleid = $_SESSION['user_roleid'];
$profile = profileUser($conn, $id_user);
headMain($tittle = "Daily Report | Dashboard", $href = baseURL);
$daftarSiswa = getSiswaProgram($conn, $id_user, $id_program);
// var_dump(mysqli_fetch_assoc($daftarSiswa));
// die;
?>
<div class="container-scroller">
     <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
          <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
               <a class="navbar-brand brand-logo" href="index.php"><img src="<?= baseURL ?>Assets/images/logo.png" class="mr-2" alt="logo" /></a>
               <a class="navbar-brand brand-logo-mini" href="index.php"><img src="<?= baseURL ?>Assets/images/logo.png" alt="logo" /></a>
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
                    <a class="btn btn-primary btn-sm mt-2" href="">Ubah Profile</a>
               </div>
               <ul class="nav">
                    <li class="nav-item">
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
                    <li class="nav-item active">
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
                         <a class="nav-link" href="#">
                              <i class="ti-power-off menu-icon"></i>
                              <span class="menu-title">Logout</span>
                         </a>
                    </li>
               </ul>
          </nav>
          <div class="main-panel">
               <div class="content-wrapper">
                    <form class="form" method="POST" action="../../Models/helper/pembimbing/tambahAbsen.php?id=<?= $id_program ?>" enctype="multipart/form-data">
                         <div class="row">
                              <div class="col">
                                   <div class="card">
                                        <div class="card-body">
                                             <div class="card-title">Absensi Siswa</div>
                                             <div class="d-lg-none">
                                                  <div class="form-group">
                                                       <div class="input-group">
                                                            <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username">
                                                            <div class="input-group-append">
                                                                 <button class="btn btn-sm btn-primary" type="button" id="search-button">Search</button>
                                                            </div>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="table-responsive" id="content">
                                                  <table class="table table-striped">
                                                       <thead>
                                                            <tr>
                                                                 <th>Foto</th>
                                                                 <th>Nama</th>
                                                                 <th class="text-center" style="min-width: 150px">Kehadiran</th>
                                                                 <th class="text-center" width="200">Keterangan</th>
                                                            </tr>
                                                       </thead>
                                                       <tbody>
                                                            <?php while ($data = mysqli_fetch_assoc($daftarSiswa)) : ?>

                                                                 <tr>
                                                                      <td><img src="<?= baseURL . $data['profile_foto'] ?>" alt="pp" /></td>
                                                                      <td><?= $data['profile_nama'] ?></td>
                                                                      <td class="d-none d-lg-flex justify-content-between d-xs-none">
                                                                           <div class="form-check form-check-success">
                                                                                <label class="form-check-label" for="hadir-<?= $data['user_id'] ?>">
                                                                                     <input type="radio" class="form-check-input" name="kehadiran['<?= $data['user_id'] ?>']" id="hadir-<?= $data['user_id'] ?>" value="Hadir" />
                                                                                     Hadir
                                                                                </label>
                                                                           </div>
                                                                           <div class="form-check form-check-warning">
                                                                                <label class="form-check-label" for="izin-<?= $data['user_id'] ?>">
                                                                                     <input type="radio" class="form-check-input" name="kehadiran['<?= $data['user_id'] ?>']" id="izin-<?= $data['user_id'] ?>" value="Izin" />
                                                                                     Izin
                                                                                </label>
                                                                           </div>
                                                                           <div class="form-check form-check-danger">
                                                                                <label class="form-check-label" for="alpha-<?= $data['user_id'] ?>">
                                                                                     <input type="radio" class="form-check-input" name="kehadiran['<?= $data['user_id'] ?>']" id="alpha-<?= $data['user_id'] ?>" value="Alpha" />
                                                                                     Alpha
                                                                                </label>
                                                                           </div>
                                                                      </td>
                                                                      <td class="d-lg-none">
                                                                           <select class="form-control" name="kehadiran[${data.id_siswa}]">
                                                                                <option value="" selected disabled>Masukkan Kehsadiran
                                                                                </option>
                                                                                <option value="Hadir">Hadir</option>
                                                                                <option value="Izin">Izin</option>
                                                                                <option value="Alpha">Alpha</option>
                                                                           </select>
                                                                      </td>
                                                                      <td>
                                                                           <input type="text" class="form-control" name="keterangan[<?= $data['user_id'] ?>]" />
                                                                      </td>
                                             </div>
                                             </tr>
                                        <?php endwhile ?>
                                        </tbody>
                                        </table>
                                        <button type="submit">Simpan</button>
                                        </div>
                                   </div>
                              </div>
                         </div>
               </div>
               </form>
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
<script src="<?= baseURL ?>Assets/js/ajax.js"></script>
<script src="<?= baseURL ?>Assets/js/file-upload.js"></script>
<script src="<?= baseURL ?>Assets/js/absensi.js"></script>
</body>

</html>