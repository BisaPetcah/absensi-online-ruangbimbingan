<?php
function tambahProgram($conn, $post) {
    $id_pembimbing = $post['user_id'];
    $nama_program = $post['nama_program'];
    $query = "INSERT INTO m_program VALUE (NULL, '$nama_program', $id_pembimbing)";
    if (!$conn->query($query)) {
        return false;
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
