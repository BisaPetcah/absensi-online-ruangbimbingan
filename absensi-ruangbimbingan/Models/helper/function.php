<?php

const baseURL = "http://localhost/absensi-online-ruangbimbingan/absensi-ruangbimbingan/";

// Admin
function dataAllAdmin($conn, $id_user){
     $query = "SELECT `m_profile`.`profile_nama`, `m_profile`.`profile_alamat`, `m_profile`.`profile_noHp`, `m_profile`.`profile_foto`, `m_user`.`user_username`, `m_user`.`user_email`
     FROM `m_profile`
     JOIN `m_user` ON `m_user`.`user_id` = `m_profile`.`profile_userid`
     WHERE `m_user`.`user_id` = '$id_user'";
     $result = mysqli_query($conn, $query);
     $result = mysqli_fetch_assoc($result);

     return $result;
}

function profileUser($conn, $id_user) {
     $query = "SELECT `profile_nama`, `profile_foto` 
     FROM `m_profile` 
     WHERE `m_profile`.`profile_userid` = '$id_user'";
     $result = mysqli_query($conn, $query);
     $result = mysqli_fetch_assoc($result);

     return $result;
}

function daftarPembimbing($conn){
     $query = "SELECT `m_user`.`user_id`, `m_user`.`user_email`,  `m_profile`.`profile_nama`,  `m_profile`.`profile_alamat`,  `m_profile`.`profile_noHp`,  `m_profile`.`profile_foto`
     FROM `m_profile`
     JOIN `m_user` ON `m_user`.`user_id` = `m_profile`.`profile_userid`";
     $result = mysqli_query($conn, $query);
     
     return $result;
}
