<?php
session_start();
include_once '../aksi/config.php';
header('Content-Type: application/json');
function getDataSiswa($id_akun, $kelas)
{
    global $conn;
    $query = "SELECT *
    FROM kelas k
    JOIN siswa s
    ON s.id_kelas = k.id_kelas
    WHERE s.id_kelas = $kelas AND k.id_akun = $id_akun";
    $result = $conn->query($query)->fetch_all(MYSQLI_ASSOC);
    echo json_encode($result);
}

$id_kelas = $_GET['kelas'];
$id_akun = $_SESSION['id_akunLogin'];
getDataSiswa($id_akun, $id_kelas);
