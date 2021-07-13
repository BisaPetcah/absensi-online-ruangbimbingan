<?php
     session_start();
     require "../../Action/config.php";
     include "function.php";

     $username = htmlspecialchars($_POST['username']);
     $password = htmlspecialchars($_POST['password']);
     $queryLogin = "SELECT `user_id`, `user_username`, `user_email`, `user_password`, `user_roleid`  
     FROM `m_user` WHERE `user_username` = '$username' OR `user_email` = '$username'";                       
     $cekLogin = mysqli_query($conn, $queryLogin);

     if (mysqli_num_rows($cekLogin) === 1) {
          $result = mysqli_fetch_assoc($cekLogin);
          if(password_verify($password, $result["user_password"])) {

                    $_SESSION["login"] = true;
                    $_SESSION["user_username"] = $result['user_username'];
                    $_SESSION["user_id"] = $result['user_id'];
                    $_SESSION["user_roleid"] = $result['user_roleid'];

                    if(isset($_POST["rememberme"])) {
                         setcookie("login", "tetap_ingat", time()+30);
                    } else {
                         // Cek jika, Cookie yang belum ada
                         // echo "Coockie Belum Ada";
                    }
                    if ($result['user_roleid'] == 1) {
                         echo "<script>alert('Anda Berhasil Login!'); window.location.href = '../../Views/admin/index.php';</script>";
                    } else if($result['user_roleid'] == 2) {
                         echo "<script>alert('Anda Berhasil Login!'); window.location.href = '../../Views/pembimbing/index.php';</script>";
                    } else if($result['user_roleid'] == 3) {
                         echo "<script>alert('Anda Berhasil Login!'); window.location.href = '../../Views/siswa/index.php';</script>";
                    }
               } else {
                    echo "<script>alert('Password Anda Salah!'); window.location.href = '../../Views/login.php'</script>";
               }
          } else {
                    echo "<script>alert('Akun Tidak Ada!'); window.location.href = '../../Views/login.php'</script>";
          }

?>