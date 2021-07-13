<?php
// Session
session_start();
include "../Models/helper/template.php";

// Head
echo headFirst($tittle = "Daily Report | Login", $href = "../");
?>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper auth px-0 bg-primary">
            <div class="row mx-0">
                <div class="col d-flex justify-content-center">
                    <div class="brand-logo">
                        <img src="../Assets/images/logo.png" alt="logo">
                    </div>
                </div>
            </div>
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <h4>Silahkan Login</h4>
                        <!-- Awal Form Login -->
                        <form action="../Models/helper/login.php" method="POST" class="pt-3">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                            </div>
                            <div class="my-2 d-flex justify-content-between align-items-center">
                                <div class="form-check">
                                    <label class="form-check-label text-muted">
                                        <input type="checkbox" class="form-check-input" name="rememberme">
                                        Rememberme
                                    </label>
                                </div>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="masuk">Masuk</button>
                            </div>
                        </form>
                        <!-- Akhir Form Login -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= bodyScript($src = "../"); ?>