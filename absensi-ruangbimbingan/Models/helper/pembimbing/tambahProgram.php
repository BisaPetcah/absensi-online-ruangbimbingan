<?php
session_start();
require "../../../Action/config.php";
include "../../../Models/helper/function.php";
include "../../../Models/helper/programFunction.php";
$_POST['user_id'] = $_SESSION['user_id'];
$id_program = tambahProgram($conn, $_POST);
$siswa = $_POST['siswa'];
foreach ($siswa as $id_siswa) {
    tambahUserProgram($conn, $id_program, $id_siswa);
}

header('Location: ../../../Views/pembimbing/program-daftar.php');
