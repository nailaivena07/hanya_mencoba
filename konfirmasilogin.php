<?php
session_start();
include("koneksi.php");

if (isset($_POST['login'])) {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    if (empty($user)) {
        header("Location: index.php?gagal=userKosong");
        exit;
    } elseif (empty($pass)) {
        header("Location: index.php?gagal=passKosong");
        exit;
    }

    $username = mysqli_real_escape_string($koneksi, $user);
    $password = mysqli_real_escape_string($koneksi, MD5($pass));

    $sql    = "SELECT id_user, level FROM tb_user WHERE username='$username' AND password='$password'";
    $query  = mysqli_query($koneksi, $sql);
    $jumlah = mysqli_num_rows($query);

    if ($jumlah == 1) {
        $data               = mysqli_fetch_row($query);
        $_SESSION['id_user'] = $data[0];
        $_SESSION['level']   = $data[1];
        header("Location: home.php");
        exit;
    } else {
        header("Location: index.php?gagal=passSalah");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
