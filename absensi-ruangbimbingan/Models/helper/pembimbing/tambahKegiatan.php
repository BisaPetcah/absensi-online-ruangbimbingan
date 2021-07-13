<?php
    session_start();
    require "../config.php";
    include "../functionClass.php";

    $id_kegiatan = tambahKegiatan($conn, $_POST);
    foreach ($_POST['kehadiran'] as $id_siswa => $kehadiran) {
        tambahAbsen($conn, $id_kegiatan, $id_siswa, $kehadiran);
    }
    if (cekFoto($_FILES['foto_profile'], 1000000, array('png', 'jpg'), 'images/bukti/')) {
        tambahBukti($conn, $id_kegiatan, $_POST['id_kelas'], '../images/bukti/' . $_FILES['foto_profile']['name']);
            echo "<script>alert('Berhasil');window.location.href='../../absensi.php';</script>";
    } else {
        echo "<script>alert('Gagal');window.location.href='../../absensi.php';</script>";
    }
?>