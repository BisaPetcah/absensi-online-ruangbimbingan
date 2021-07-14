<?php
session_start();
require "../../../Action/config.php";
include "../../../Models/helper/function.php";
include "../../../Models/helper/programFunction.php";
// header('Content-Type: application/json');
$id_siswa = tambahUser($conn, $_POST, 3);
$profile = tambahProfile($conn, $_POST, $_FILES['foto_profile'], $id_siswa);
if (!$profile) {
    echo $profile;
} else {
    header('Location: ../../../Views/pembimbing/siswa-daftar.php');
}
