<?php
     require "../config.php";
     include "../functionClass.php";
     $id_akun = $_GET['id'];

     if(deleteGuru($conn, $id_akun) > 0) {
          echo "<script>alert('Berhasil'); window.location.href = '../../guru/daftar.php';</script>";
     } else {
          echo "<script>alert('Gagal'); window.location.href = '../../guru/daftar.php';</script>";
     }

?>