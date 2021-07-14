<?php
session_start();
require "../../../Action/config.php";
include "../../../Models/helper/function.php";
// header('Content-Type: application/json');
// echo json_encode($_SESSION);
foreach ($_SESSION['post'] as $post_key => $post_value) {
    $_POST[$post_key] = $post_value;
}
$_FILES = $_SESSION['files'];

// var_dump($_POST);
// die;
$id_aktivitas = tambahKegiatan($conn, $_POST, $_FILES['foto-bukti']);
$kehadiran = $_POST['kehadiran'];
foreach ($kehadiran as $k_key => $k_value) {
    $_POST['status'] = $k_value;
    echo tambahAbsenSiswa($conn, $_POST, $id_aktivitas, $k_key);
    // return;
}
unset($_SESSION['post']);
unset($_SESSION['files']);
header('Location: ' . baseURL . 'Views/pembimbing/absensi.php');
exit;
