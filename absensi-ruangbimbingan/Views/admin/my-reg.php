<?php
// Session
session_start();
require "../../Action/config.php";
include "../../Models/helper/template.php";
include "../../Models/helper/function.php";


echo headFirst($tittle = "Daily Report | Register Admin", $href = "../../");
?>
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper bg-primary auth px-0">
            <div class="row mx-0">
                <div class="col d-flex justify-content-center">
                    <div class="brand-logo">
                        <img src="../../Assets/images/logo.png" alt="logo">
                    </div>
                </div>
            </div>
            <div class="row w-100 mx-0">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                        <h4>Registrasi Admin</h4>
                        <!-- Awal Form Register -->
                        <form action="<?= baseURL?>/Models/helper/register/register-admin" method="POST" enctype="multipart/form-data" class="pt-3" validated>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="nama" placeholder="Masukkan Anda" name="nama" required
                                oninvalid="this.setCustomValidity('Anda belum mengisi nama')" oninput="this.setCustomValidity('')">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="username" placeholder="Masukkan Username" name="username" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-lg" id="email" placeholder="Masukkan Email" name="email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-lg" id="password" placeholder="Masukkan Password" name="password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-lg" id="cekpassword" placeholder="Masukkan Kembali Password" name="cekpassword" required>
                            </div>
                            <div class="form-group">
                            <textarea class="form-control form-control-lg" id="alamat" rows="5" placeholder="Masukkan Alamat" name="alamat" required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control form-control-lg" id="exampleInputNoHp" placeholder="No Hp" name="noHp" required>
                            </div>
                            <div class="form-group">
                                        <label>Upload Foto</label>
                                        <input type="file" id="upload_foto" name="foto_profile"  class="file-upload-default"/>
                                        <div class="input-group col-xs-12">
                                            <input disabled type="text" class="form-control file-upload-info" placeholder="Foto Profile"/>
                                            <span  class="input-group-append">
                                                <button for="upload_foto" class="file-upload-browse btn btn-primary"
                                                        type="button">Upload</button>
                                                </span>
                                        </div>
                                <div class="mt-4">
                                    <div class="form-check">
                                        <label class="form-check-label text-muted">
                                            <input type="checkbox" class="form-check-input" required>
                                            Data sudah benar?
                                        </label>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="daftar">Daftar</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Sudah Punya Akun? <a href="../login.php" class="text-primary">Masuk</a>
                                </div>
                        </form>
                        <!-- Akhir Form Register -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= bodyScript($src = baseURL); ?>