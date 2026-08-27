<?php
session_start();
include('koneksi.php');

if (!isset($_SESSION['id_user'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['kategori_blog'])) {
    $id_kategori_blog = (int)$_POST['id_kategori_blog'];
    $kategori_blog    = mysqli_real_escape_string($koneksi, $_POST['kategori_blog']);

    if (empty($kategori_blog)) {
        header("Location: editkategoriblog.php?data=$id_kategori_blog&notif=editkosong");
        exit;
    }

    $sql   = "UPDATE kategori_blog SET kategori_blog='$kategori_blog' WHERE id_kategori_blog='$id_kategori_blog'";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        header("Location: home.php?notif=editberhasil");
        exit;
    } else {
        header("Location: editkategoriblog.php?data=$id_kategori_blog&notif=editkosong");
        exit;
    }
} else {
    header("Location: home.php");
    exit;
}
