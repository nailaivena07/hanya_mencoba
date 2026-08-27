<?php
session_start();
include('koneksi.php');

if (!isset($_SESSION['id_user'])) {
    header("Location: index.php");
    exit;
}

if (isset($_POST['kategori_blog'])) {
    $kategori_blog = mysqli_real_escape_string($koneksi, $_POST['kategori_blog']);

    if (empty($kategori_blog)) {
        header("Location: tambahkategoriblog.php?notif=tambahkosong");
        exit;
    }

    $sql   = "INSERT INTO kategori_blog (kategori_blog) VALUES ('$kategori_blog')";
    $query = mysqli_query($koneksi, $sql);

    if ($query) {
        header("Location: home.php?notif=tambahberhasil");
        exit;
    } else {
        header("Location: tambahkategoriblog.php?gagal=error");
        exit;
    }
} else {
    header("Location: home.php");
    exit;
}
