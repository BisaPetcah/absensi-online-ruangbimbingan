<?php
session_start();
require "../../../Action/config.php";
include "../function.php";

// Cek Duplikasi
$username = htmlspecialchars($_POST['username']);
$queryUsername = "SELECT `user_username` FROM `m_user` WHERE `user_username` = '$username'";
$cekUsername = mysqli_num_rows(mysqli_query($conn, $queryUsername));

$email = htmlspecialchars($_POST['email']);
$queryEmail = "SELECT `user_email` FROM `m_user` WHERE `user_email` = '$email'";
$cekEmail = mysqli_num_rows(mysqli_query($conn, $queryEmail));
if ($cekUsername > 0) {
     return "<script>alert('Username sudah digunakan!'); window.location.href = '../../Views/admin/my-reg.php';</script>";
} else if ($cekEmail > 0) {
     return "<script>alert('Email sudah digunakan!'); window.location.href = '../../Views/admin/my-reg.php';</script>";
} else if ($username === $email) {
     return "<script>alert('Username dan Email tidak boleh sama!'); window.location.href = '../../Views/admin/my-reg.php';</script>";
} else {
     //m_user
     $password = htmlspecialchars($_POST['password']);
     $password = password_hash($password, PASSWORD_DEFAULT);

     //m_profile
     $nama = htmlspecialchars($_POST['nama']);
     $alamat = htmlspecialchars($_POST['alamat']);
     $noHp = htmlspecialchars($_POST['noHp']);

     //Foto
     $cek_ekstensi = array('jpg', 'png', 'jpeg');
     $name = $_FILES['foto']['name'];
     $size = $_FILES['foto']['size'];
     $tmpCek = explode('.', $name);
     $extensi = strtolower(end($tmpCek));
     $tmpFile = $_FILES['foto']['tmp_name'];

     if ($size > 1000000) {
          // Tidak lakukan apapun
     } else {
          // Jalankan Query Insert
          if (in_array($extensi, $cek_ekstensi) == true) {
               if ($size < 1000000) {
                    //InsertUser
                    $queryUser = "INSERT INTO `m_user`(`user_id`, `user_username`, `user_email`, `user_password`, `user_isActive`, `user_roleid`) 
                         VALUES (NULL,'$username','$email','$password','1','3')";
                    mysqli_query($conn, $queryUser);
                    $id_user = mysqli_insert_id($conn);

                    //InsertProfile
                    $moveFile = 'Assets/images/documentation/foto-profile-pengguna/siswa/' . $name;
                    move_uploaded_file($tmpFile, baseURL . $moveFile);
                    $queryProfile = "INSERT INTO `m_profile`(`profile_id`, `profile_nama`, `profile_alamat`, `profile_noHp`, `profile_foto`, `profile_userid`) 
                         VALUES (NULL,'$nama','$alamat','$noHp','$moveFile','$id_user')";
                    if (mysqli_query($conn, $queryProfile)) {
                         return "<script>alert('Silahkan Login!'); window.location.href = '../../Views/login.php';</script>";
                    } else {
                         return "<script>alert('Gambar Gagal Upload'); window.location.href = '../../register.php';</script>";
                    }
               } else {
                    return "<script>alert('Ukuran Gambar Terlalu Besar'); window.location.href = '../../register.php';</script>";
               }
          } else {
               return "<script>alert('Ekstensi Tidak Didukung'); window.location.href = '../../register.php';</script>";
          }
     }
}
