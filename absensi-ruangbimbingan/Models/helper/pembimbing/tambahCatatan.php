<?php
session_start();
require "../../../Action/config.php";
include "../function.php";

$user_id = $_SESSION['user_id'];
$tanggal = htmlspecialchars($_POST['tanggal']);
$catatan = htmlspecialchars($_POST['catatan']);

$query = "INSERT INTO `m_catatan`(`catatan_id`, `catatan_tanggal`, `catatan_isi`, `catatan_userid`) 
VALUES (NULL,'$tanggal','$catatan',$user_id)";

if(mysqli_query($conn, $query)){
     echo "<script>alert('Catatan telah ditambahkan!'); window.location.href = ".baseURL."Views/pembimbing/catatan.php';</script>";
} else {
     echo "<script>alert('Catatan gagal ditambahkan!'); window.location.href = ".baseURL."Views/pembimbing/catatan.php';</script>";
}
