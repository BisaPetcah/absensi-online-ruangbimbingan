<?php
// Template Login & Register my-reg
function headFirst($tittle, $href)
{
    $value = '<!DOCTYPE html>
            <html lang="en">
            
            <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <title>' . $tittle . '</title>
                <link rel="stylesheet" href="' . $href . 'Assets/vendors/feather/feather.css">
                <link rel="stylesheet" href="' . $href . 'Assets/vendors/ti-icons/css/themify-icons.css">
                <link rel="stylesheet" href="' . $href . 'Assets/vendors/css/vendor.bundle.base.css">
                <link rel="stylesheet" href="' . $href . 'Assets/css/vertical-layout-light/style.css">
                <link rel="shortcut icon" href="' . $href . 'Assets/images/favicon.png"/>
            </head>
            
            <body>';

    return $value;
}
function bodyScript($src)
{
    $value = '<script src="' . $src . 'Assets/vendors/js/vendor.bundle.base.js"></script>
    <script src="' . $src . 'Assets/js/off-canvas.js"></script>
    <script src="' . $src . 'Assets/js/hoverable-collapse.js"></script>
    <script src="' . $src . 'Assets/js/template.js"></script>
    <script src="' . $src . 'Assets/js/settings.js"></script>
    <script src="' . $src . 'Assets/js/todolist.js"></script>
    <script src="'. $src .'Assets/js/file-upload.js"></script>
    </body>
    
    </html>';

    return $value;
}

// Register User
function registerUser($conn, $post, $files)
{
    // Cek Duplikasi
    $username = htmlspecialchars($post['username']);
    $queryUsername = "SELECT `user_username` FROM `m_user` WHERE `user_username` = '$username'";
    $cekUsername = mysqli_num_rows(mysqli_query($conn, $queryUsername));

    $email = htmlspecialchars($post['email']);
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
        $password = htmlspecialchars($post['password']);
        $password = password_hash($password, PASSWORD_DEFAULT);

        //m_profile
        $nama = htmlspecialchars($post['nama']);
        $alamat = htmlspecialchars($post['alamat']);
        $noHp = htmlspecialchars($post['noHp']);

        //Foto
        $cek_ekstensi = array('jpg', 'png', 'jpeg');
        $name = $files['foto']['name'];
        $size = $files['foto']['size'];
        $tmpCek = explode('.', $name);
        $extensi = strtolower(end($tmpCek));
        $tmpFile = $files['foto']['tmp_name'];

        if ($size > 1000000) {
            // Tidak lakukan apapun
        } else {
            // Jalankan Query Insert
            if (in_array($extensi, $cek_ekstensi) == true) {
                if ($size < 1000000) {
                    //InsertUser
                    $queryUser = "INSERT INTO `m_user`(`user_id`, `user_username`, `user_email`, `user_password`, `user_isActive`, `user_roleid`) 
                        VALUES (NULL,'$username','$email','$password','1','1')";
                    mysqli_query($conn, $queryUser);
                    $id_user = mysqli_insert_id($conn);

                    //InsertProfile
                    $moveFile = 'Assets/images/documentation/foto-profile-pengguna/admin/' . $name;
                    move_uploaded_file($tmpFile, '../../' . $moveFile);
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
}

// Template Main
function headMain($tittle, $href)
{
     $value = '<!DOCTYPE html>
               <html lang="en">
               <head>
                    <meta charset="utf-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
                    <title>' . $tittle . '</title>
                    <link rel="stylesheet" href="' . $href . 'Assets/vendors/feather/feather.css" />
                    <link rel="stylesheet" href="' . $href . 'Assets/vendors/ti-icons/css/themify-icons.css" />
                    <link rel="stylesheet" href="' . $href . 'Assets/vendors/css/vendor.bundle.base.css" />
                    <link rel="stylesheet" href="' . $href . 'Assets/vendors/ti-icons/css/themify-icons.css" />
                    <link rel="stylesheet" href="' . $href . 'Assets/vendors/mdi/css/materialdesignicons.min.css" />
                    <link rel="stylesheet" href="' . $href . 'Assets/css/vertical-layout-light/style.css" />
                    <link rel="shortcut icon" href="' . $href . 'Assets/images/favicon.png" />
               </head>
               <body>';
     echo $value;
}

function footerMain($src)
{
     $value = '<script src="' . $src . 'Assets/vendors/js/vendor.bundle.base.js"></script>
               <script src="' . $src . 'Assets/vendors/datatables.net/jquery.dataTables.js"></script>
               <script src="' . $src . 'Assets/js/off-canvas.js"></script>
               <script src="' . $src . 'Assets/js/hoverable-collapse.js"></script>
               <script src="' . $src . 'Assets/js/template.js"></script>
               </body>
               
               </html>';

     return $value;
}