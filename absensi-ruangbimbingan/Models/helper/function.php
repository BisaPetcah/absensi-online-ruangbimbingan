<?php
$da = 'asaf';
const baseURL = "http://localhost:56817/apa-dr/absensi-ruangbimbingan/";

// Admin
function dataAllAdmin($conn, $id_user)
{
    $query = "SELECT `m_profile`.`profile_nama`, `m_profile`.`profile_alamat`, `m_profile`.`profile_noHp`, `m_profile`.`profile_foto`, `m_user`.`user_username`, `m_user`.`user_email`
     FROM `m_profile`
     JOIN `m_user` ON `m_user`.`user_id` = `m_profile`.`profile_userid`
     WHERE `m_user`.`user_id` = '$id_user' AND m_user.user_isActive = 1";
    $result = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($result);

    return $result;
}

function profileUser($conn, $id_user)
{
    $query = "SELECT `profile_nama`, `profile_foto` 
     FROM `m_profile` 
     WHERE `m_profile`.`profile_userid` = '$id_user'";
    $result = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($result);

    return $result;
}

function daftarCatatanAdmin($conn){
    $query = "SELECT `catatan_tanggal`, `catatan_isi` 
    FROM `m_catatan`";
    $result = mysqli_query($conn, $query);

    return $result;
}

function daftarCatatanPembimbing($conn, $id_user){
    $query = "SELECT `catatan_tanggal`, `catatan_isi` 
    FROM `m_catatan` 
    WHERE `catatan_userid` = '$id_user'";
    $result = mysqli_query($conn, $query);

    return $result;
}

function daftarPembimbing($conn)
{
    $query = "SELECT `m_user`.`user_id`, `m_user`.`user_email`,  `m_profile`.`profile_nama`,  `m_profile`.`profile_alamat`,  `m_profile`.`profile_noHp`,  `m_profile`.`profile_foto`
     FROM `m_profile`
     JOIN `m_user` ON `m_user`.`user_id` = `m_profile`.`profile_userid`
     WHERE m_user.user_roleid = 2 AND m_user.user_isActive = 1";
    $result = mysqli_query($conn, $query);

    return $result;
}

function daftarSiswa($conn)
{
    $query = "SELECT u.user_id, p.profile_nama, p.profile_alamat, p.profile_jenisKelamin, p.profile_noHp, p.profile_foto
    FROM m_user u
    JOIN m_profile p on u.user_id = p.profile_userid
    WHERE u.user_roleid = 3 AND u.user_isActive = 1
    ORDER BY `p`.`profile_nama` ASC";
    $result = mysqli_query($conn, $query);

    return $result;
}

function listProgram($conn, $id_pembimbing)
{
    $query = "SELECT program_id, program_nama, program_deskripsi
    FROM m_program
    WHERE program_pembimbingid = $id_pembimbing";
    $result = mysqli_query($conn, $query);

    return $result;
}

function getSiswaProgram($conn, $id_pembimbing, $id_program)
{
    $query = "SELECT mu.user_id, p.profile_foto, p.profile_nama, p.profile_noHp, mu.user_email
    FROM m_program mp
    LEFT JOIN t_userprogram tu on mp.program_id = tu.userprogram_programid
    JOIN m_user mu on tu.userprogram_siswaid = mu.user_id
    JOIN m_profile p on mu.user_id = p.profile_userid
    WHERE mp.program_pembimbingid = $id_pembimbing
    AND mp.program_id = $id_program
    AND mu.user_isActive = 1";
    $result = mysqli_query($conn, $query);

    return $result;
}

function detailProgram($conn, $id_pembimbing, $id_program)
{
    $query = "SELECT *
    FROM m_program mp
WHERE mp.program_pembimbingid = $id_pembimbing
    AND mp.program_id = $id_program";
    $result = mysqli_query($conn, $query);

    return $result;
}

function jadwalProgram($conn, $id_pembimbing, $id_program)
{
    $query = "SELECT mw.waktu_id, mw.waktu_hari, mw.waktu_mulai, mw.waktu_selesai
    FROM m_program mp
JOIN m_waktu mw on mp.program_id = mw.waktu_programId
WHERE mp.program_pembimbingid = $id_pembimbing
    AND mp.program_id = $id_program";
    $result = mysqli_query($conn, $query);

    return $result;
}

function tambahUser($conn, $post, $roleId)
{
    $username = htmlspecialchars($post['username']);
    $email = htmlspecialchars($post['email']);
    $pass = password_hash($post['password'], PASSWORD_DEFAULT);
    $query = "INSERT INTO `m_user`(`user_id`, `user_username`, `user_email`, `user_password`, `user_isActive`, `user_roleid`) 
    VALUES (NULL,'$username','$email','$pass', '1', $roleId)";
    if (!$conn->query($query)) {
        return mysqli_error($conn);
    }

    return $conn->insert_id;
}

function tambahProfile($conn, $post, $file, $userId)
{
    $nama = htmlspecialchars($post['nama']);
    $alamat = htmlspecialchars($post['alamat']);
    $noHp = htmlspecialchars($post['noHp']);
    $name = $file['name'];
    $moveFile = 'Assets/images/documentation/foto-profile-pengguna/admin/' . $name;
    $foto = cekFoto($file, 1000000, ['png', 'jpg', 'jpeg']);
    if (!$foto) {
        return false;
    }
    $query = "INSERT INTO `m_profile`(`profile_id`, `profile_nama`, `profile_alamat`, `profile_noHp`, `profile_foto`, `profile_userid`) 
    VALUES (NULL,'$nama','$alamat','$noHp','$foto','$userId')";
    if (!$conn->query($query)) {
        return mysqli_error($conn);
    }

    return $conn->insert_id;
}

// cek Foto
function cekFoto($file, int $size, array $ext)
{
    $name = $file['name'];
    $fileExt = explode('.', $name);
    $fileExt = strtolower(end($fileExt));
    $tmpFile = $file['tmp_name'];
    if ($file['error'] == 4) {
        echo 'tidak ada gambar';
        return false;
    }

    if (!in_array($fileExt, $ext)) {
        echo 'EXTENSI TIDAK SESUAI';
        return false;
    }

    if ($file['size'] > $size) {
        echo 'size lebi besar dari ' . $size;
        return false;
    }
    // gambar ada
    $moveFile = 'Assets/images/documentation/foto-profile-pengguna/admin/' . $name;
    move_uploaded_file($tmpFile, '../../../' . $moveFile);

    return $moveFile;
}

function tambahKegiatan($conn, $post, $file)
{
    $programId = $post['id_program'];
    $nama = $post['nama-kegiatan'];
    $tanggal = $post['tanggal-kegiatan'];
    $waktuMulai = $post['waktu-mulai'];
    $waktuSelesai = $post['waktu-selesai'];
    $name = $file['name'];
    $moveFile = 'Assets/images/documentation/foto-profile-pengguna/admin/' . $name;
    $foto = cekFoto($file, 1000000, ['png', 'jpg', 'jpeg']);
    if (!$foto) {
        return false;
    }
    $query = "INSERT INTO `m_aktivitas`
    (`aktivitas_nama`, `aktivitas_tanggal`, `aktivitas_waktumulai`, `aktivitas_waktuselesai`, `aktivitas_fotobukti`, `aktivitas_programid`) VALUES 
    ('$nama', '$tanggal', '$waktuMulai', '$waktuSelesai', '$foto', $programId)";
    if (!$conn->query($query)) {
        return false;
    }
    return $conn->insert_id;
}


function tambahAbsenSiswa($conn, $post, $id_aktivitas, $id_user)
{
    $status = $post['status'];
    $keterangan = '';
    $query = "INSERT INTO `m_absen`(`absen_status`, `absen_keterangan`, `absen_userid`, `absen_aktivitasid`) VALUES 
    ('$status','$keterangan',$id_user,$id_aktivitas)";
    if (!$conn->query($query)) {
        return mysqli_error($conn);
    }
    return $conn->insert_id;
}