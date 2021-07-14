<?php
session_start();
require "../../../Action/config.php";
include "../../../Models/helper/function.php";

var_dump($_POST);
var_dump($_FILES);
$_SESSION['post'] = $_POST;
$_SESSION['files'] = $_FILES;
// die;
if (!isset($_POST['id_program'])) {
    header('Location: ' . baseURL . 'Views/pembimbing/absensi.php');
    exit;
}
// $id_aktivitas = tambahKegiatan($conn, $_POST, $_FILES['foto-bukti']);
// if (!$id_aktivitas) {
//     header('Location: ' . baseURL . 'Views/pembimbing/absensi.php');
// }
header('Location: ' . baseURL . 'Views/pembimbing/absensi-kehadiran.php?id=' . $id_aktivitas);

    // $id_kegiatan = tambahKegiatan($conn, $_POST);
    // foreach ($_POST['kehadiran'] as $id_siswa => $kehadiran) {
    //     tambahAbsen($conn, $id_kegiatan, $id_siswa, $kehadiran);
    // }
    // if (cekFoto($_FILES['foto_profile'], 1000000, array('png', 'jpg'), 'images/bukti/')) {
    //     tambahBukti($conn, $id_kegiatan, $_POST['id_kelas'], '../images/bukti/' . $_FILES['foto_profile']['name']);
    //         echo "<script>alert('Berhasil');window.location.href='../../absensi.php';</script>";
    // } else {
    //     echo "<script>alert('Gagal');window.location.href='../../absensi.php';</script>";
    // }