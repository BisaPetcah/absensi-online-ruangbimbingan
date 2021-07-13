<?php
function tambahProgram($conn, $post) {
    $id_pembimbing = $post['user_id'];
    $nama_program = $post['nama_program'];
    $deskripsi_program = $post['deskripsi_program'];
    $query = "INSERT INTO m_program VALUE (NULL, '$nama_program', '$deskripsi_program', $id_pembimbing)";
    if (!$conn->query($query)) {
        return mysqli_error($conn);
    }
    return $conn->insert_id;
}

function tambahUserProgram($conn, $id_program, $id_siswa) {
    $query = "INSERT INTO t_userprogram VALUE (NULL, $id_siswa, $id_program)";
    if (!$conn->query($query)) {
        return false;
    }
    return $conn->insert_id;
}

function tambahWaktu($conn, $id_program, $post) {
    $hari = $post['hari'];
    $waktuMulai = $post['waktu_mulai'];
    $waktuSelesai = $post['waktu_selesai'];
    $query = "INSERT INTO m_waktu VALUE (NULL, $id_program, '$hari', '$waktuMulai', '$waktuSelesai')";
    if (!$conn->query($query)) {
        return mysqli_error($conn);
    }
    return $conn->insert_id;
}
