<?php
    session_start();
    require "../../Action/config.php";
    include "../../Models/helper/template.php";
    include "../../Models/helper/function.php";

    $id_user = $_SESSION['user_id'];
    $user_roleid = $_SESSION['user_roleid'];
    $profile = profileUser($conn, $id_user);

    headMain($tittle = "Daily Report | Dashboard", $href = baseURL);
?>

<div class="container-scroller">
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="index.php"><img src="<?= baseURL?>Assets/images/logo.png" class="mr-2"alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.php"><img src="<?= baseURL?>Assets/images/logo.png" alt="logo"/></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            
            <ul class="navbar-nav" style="margin-left: auto">
                <li class="nav-item d-none d-lg-block">
                    <h5>
                        <a href="<?= baseURL?>Models/helper/logout.php">
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
                <div class="row">
                    <div class="col">
                        <img src="../../<?= $profile['profile_foto']?>" width="120px" height="120px" alt="profile" />
                        </div>
                    </div>
                    <h4 class="mt-1"><?= $profile['profile_nama']?></h4>
                    <h5 class="text-primary">Siswa</h5>
                    <a class="btn btn-primary btn-sm mt-2" href="">Ubah Profile</a>
            </div>
            <ul class="nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">
                        <i class="icon-grid menu-icon"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <hr class="d-lg-none" style="border: 1px solid #0066cc; width: 75%"/>
                <li class="nav-item d-lg-none">
                    <a class="nav-link" href="../../Models/helper/logout.php">
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
						<div class="row">
                                <div class="col-md-3 col-sm-6 mb-4 stretch-card transparent">
								<div class="card card-tale">
									<div class="card-body">
										<p class="fs-30">Kelas</p>
										<p>Siswa</p>
									</div>
								</div>
							</div>
						    </div>
                        </div>
					</div>
                </div>
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block"> Copyright © 2021 All rights reserved.</span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
                    </div>
            </footer>
        </div>
    </div>
</div>
<script src="vendors/js/vendor.bundle.base.js"></script>
<script src="vendors/datatables.net/jquery.dataTables.js"></script>
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/template.js"></script>
</body>
</html>
