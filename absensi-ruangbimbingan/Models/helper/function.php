<?php

const baseURL = "http://localhost/apa-dr/absensi-ruangbimbingan/";

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

function daftarPembimbing($conn)
{
    $query = "SELECT `m_user`.`user_id`, `m_user`.`user_email`,  `m_profile`.`profile_nama`,  `m_profile`.`profile_alamat`,  `m_profile`.`profile_noHp`,  `m_profile`.`profile_foto`
     FROM `m_profile`
     JOIN `m_user` ON `m_user`.`user_id` = `m_profile`.`profile_userid`
     WHERE m_user.user_roleid = 2 AND m_user.user_isActive = 1";
    $result = mysqli_query($conn, $query);

    return $result;
}

function daftarSiswa($conn, $id_pembimbing)
{
    $query = "SELECT u.user_id, p.profile_nama, p.profile_alamat, p.profile_jenisKelamin, p.profile_noHp, p.profile_foto
FROM m_user u
JOIN m_profile p on u.user_id = p.profile_userid
WHERE u.user_roleid = 3 AND u.user_isActive = 1 AND u.user_addedby = $id_pembimbing";
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

function jadwalProgram($conn, $id_pembimbing, $id_program) {
    $query = "SELECT mw.waktu_id, mw.waktu_hari, mw.waktu_mulai, mw.waktu_selesai
    FROM m_program mp
JOIN m_waktu mw on mp.program_id = mw.waktu_programId
WHERE mp.program_pembimbingid = $id_pembimbing
    AND mp.program_id = $id_program";
    $result = mysqli_query($conn, $query);

    return $result;
}
