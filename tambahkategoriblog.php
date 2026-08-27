<?php
session_start();
include('koneksi.php');

if (!isset($_SESSION['id_user'])) {
    header("Location: index.php");
    exit;
}
?>
<?php $title = 'Tambah Kategori Blog'; include('admin/includes/head.php'); ?>
<?php include('admin/includes/header.php'); ?>
<?php include('admin/includes/sidebar.php'); ?>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="home.php" class="nav-link">Home</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Sign Out <i class="fas fa-sign-out-alt"></i></a>
            </li>
        </ul>
    </nav>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="home.php" class="brand-link text-center">
            <span class="brand-text font-weight-light"><b>Admin</b>Blog</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Profil</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview menu-open">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-database"></i>
                            <p>Data Master <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="home.php" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kategori Blog</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file-alt"></i>
                            <p>Konten</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-blog"></i>
                            <p>Blog</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>Pengaturan User</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-key"></i>
                            <p>Ubah Password</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Sign Out</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><i class="fas fa-plus"></i> Tambah Kategori Blog</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="home.php">Kategori Blog</a></li>
                            <li class="breadcrumb-item active">Tambah</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <?php if(!empty($_GET['notif'])){ ?>
                            <?php if($_GET['notif']=="tambahkosong"){ ?>
                                <div class="alert alert-danger" role="alert">
                                    Maaf data kategori blog wajib di isi</div>
                            <?php } ?>
                        <?php } ?>
                        <form class="form-horizontal" method="post" action="konfirmasitambahkategoriblog.php">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="kategoriblog" class="col-sm-3 col-form-label">Kategori Blog</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="kategoriblog" name="kategori_blog" value="">
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="col-sm-10">
                                    <a href="home.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                                    <button type="submit" class="btn btn-info float-right">
                                        <i class="fas fa-plus"></i> Tambah
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-footer -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('admin/includes/footer.php'); ?>
<?php include('admin/includes/script.php'); ?>
