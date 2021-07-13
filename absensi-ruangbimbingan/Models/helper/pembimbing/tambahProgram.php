<?php
session_start();
require "../../../Action/config.php";
include "../../../Models/helper/function.php";
include "../../../Models/helper/programFunction.php";
$_POST['user_id'] = $_SESSION['user_id'];
header('Content-Type: application/json');
//echo json_encode($_POST['waktu']);
//die;
$listwaktu = $_POST['waktu'];
$id_program = tambahProgram($conn, $_POST);
$siswa = $_POST['siswa'];
foreach ($siswa as $id_siswa) {
    tambahUserProgram($conn, $id_program, $id_siswa);
}
foreach ($listwaktu as $waktu_key => $waktu_value) {
    $data['hari'] = $waktu_key;
    if ($waktu_value[0] != '' and $waktu_value[1] != '') {
        $data['waktu_mulai'] = $waktu_value[0];
        $data['waktu_selesai'] = $waktu_value[1];
        $tes = tambahWaktu($conn, $id_program, $data);
        if (!$tes) {
            echo $tes;
            return;
        }
    }
//    echo json_encode($data);
}

header('Location: ../../../Views/pembimbing/program-daftar.php');
