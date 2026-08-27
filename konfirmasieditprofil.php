<?php
session_start();
include('koneksi.php');

if (isset($_SESSION['id_user'])) {
    $id_user = $_SESSION['id_user'];
    $nama    = $_POST['nama'];
    $email   = $_POST['email'];

    // get foto lama
    $sql_f  = "SELECT `foto` FROM `tb_user` WHERE `id_user`='$id_user'";
    $query_f = mysqli_query($koneksi, $sql_f);
    while ($data_f = mysqli_fetch_row($query_f)) {
        $foto = $data_f[0];
    }

    if (empty($nama)) {
        header("Location:editprofil.php?notif=editkosong&jenis=nama");
    } else {
        $lokasi_file  = $_FILES['foto']['tmp_name'];
        $nama_file    = $_FILES['foto']['name'];
        $direktori    = 'foto/'.$nama_file;
        if (move_uploaded_file($lokasi_file, $direktori)) {
            if (!empty($foto)) {
                unlink("foto/$foto");
            }
            $sql = "UPDATE `tb_user` SET `nama`='$nama', `foto`='$nama_file' WHERE `id_user`='$id_user'";
            mysqli_query($koneksi, $sql);
        } else {
            $sql = "UPDATE `tb_user` SET `nama`='$nama' WHERE `id_user`='$id_user'";
            mysqli_query($koneksi, $sql);
        }
        header("Location:profil.php?notif=editberhasil");
    }
}
?>
