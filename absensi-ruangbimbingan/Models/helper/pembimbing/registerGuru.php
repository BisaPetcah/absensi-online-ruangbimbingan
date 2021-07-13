<?php
     require "../config.php";

     //Cek Duplikasi
     $username = htmlspecialchars($_POST["username"]);

     //Cek Guru
     $queryCekUsernameGuru = "SELECT `username` FROM `akun_guru` WHERE `username` = '$username'";
     $cekUsernameGuru = mysqli_num_rows(mysqli_query($conn, $queryCekUsernameGuru));

     //Cek Admin
     $queryCekUsernameAdmin = "SELECT `username` FROM `akun_admin` WHERE `username` = '$username'";
     $cekUsernameAdmin = mysqli_num_rows(mysqli_query($conn, $queryCekUsernameAdmin));

     if ($cekUsernameGuru > 0 OR $cekUsernameAdmin > 0) {
          echo "<script>alert('Akun Sudah Ada'); window.location.href = '../../guru/tambah.php';</script>";
     }else {
          //Akun
          $password = htmlspecialchars($_POST["password"]);
          $password = password_hash($password, PASSWORD_DEFAULT);

          //Profile
          $nama = htmlspecialchars($_POST['nama']);
          $alamat = htmlspecialchars($_POST['alamat']);
          $noHp = htmlspecialchars($_POST['noHp']);

          //Foto
          $cek_ekstensi = array('jpg','png','jpeg');
          $name = $_FILES['foto_profile']['name'];
          $size = $_FILES['foto_profile']['size'];
          $tmpCek = explode('.', $name);
          $extensi = strtolower(end($tmpCek));
          $tmpFile = $_FILES['foto_profile']['tmp_name'];
          if ($size > 1000000) {
               // Tidak lakukan apapun
               } else {
               // Jalankan Query Insert
               if(in_array($extensi, $cek_ekstensi) == true) {
                    if($size < 1000000) {    
                         //InsertAkun
                         $queryAkun = "INSERT INTO `akun_guru`(`id_akun`, `username`, `password`) 
                         VALUES (NULL, '$username', '$password')";
                         mysqli_query($conn, $queryAkun);
                         $id_akun = mysqli_insert_id($conn);

                         //InsertProfile
                         $moveFile = 'images/foto-profile/guru/'. $name;
                         move_uploaded_file($tmpFile, '../../'.$moveFile );
                         $queryProfile = "INSERT INTO `profile_guru`(`id_profile`, `id_akun`, `nama`, `alamat`, `noHp`,`foto_profile`, `level`) 
                         VALUES (NULL, '$id_akun', '$nama', '$alamat', '$noHp','$moveFile', 'Guru')";
                         
                         if(mysqli_query($conn, $queryProfile)) {
                              echo "<script>alert('Akun Berhasil Digunakan!'); window.location.href = '../../guru/daftar.php';</script>";
                         } else {
                              var_dump($queryProfile);
                              die;
                              echo "<script>alert('Gambar Gagal Upload'); window.location.href = '../../guru/tambah.php';</script>";
                         }
                    } else {
                         echo "<script>alert('Ukuran Gambar Terlalu Besar'); window.location.href = '../../guru/tambah.php';</script>";
                    } 
               }else {
                         echo "<script>alert('Ekstensi Tidak Didukung'); window.location.href = '../../guru/tambah.php';</script>";
               }
          }
     }     
?>