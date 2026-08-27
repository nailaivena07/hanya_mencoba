<?php
session_start();
include('koneksi.php');

if (!isset($_SESSION['id_user'])) {
    header("Location: index.php");
    exit;
}

$id_user = $_SESSION['id_user'];
$sql = "SELECT `nama`, `username`, `foto` FROM `tb_user` WHERE `id_user`='$id_user'";
$query = mysqli_query($koneksi, $sql);
while ($data = mysqli_fetch_row($query)) {
    $nama  = $data[0];
    $email = $data[1];
    $foto  = $data[2];
}
?>
<!DOCTYPE html>
<?php $title = 'Profil'; include('admin/includes/head.php'); ?>
<?php include('admin/includes/header.php'); ?>
<?php include('admin/includes/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Profil</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Profil</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <div class="card-tools">
                            <a href="editprofil.php" class="btn btn-info btn-sm float-right">
                                <i class="fas fa-edit"></i> Edit Profil
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php if(!empty($_GET['notif'])){ ?>
                            <?php if($_GET['notif']=="editberhasil"){ ?>
                                <div class="alert alert-success" role="alert">
                                    Data Berhasil Diubah</div>
                            <?php } ?>
                        <?php } ?>
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td colspan="2"><i class="fas fa-user-circle"></i>
                                        <strong>PROFIL</strong></td>
                                </tr>
                                <tr>
                                    <td width="20%"><strong>Foto</strong></td>
                                    <td width="80%">
                                        <?php if (!empty($foto)): ?>
                                            <img src="foto/<?php echo $foto; ?>" class="img-fluid" width="200px">
                                        <?php else: ?>
                                            <i class="fas fa-user-circle fa-5x"></i>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%"><strong>Nama</strong></td>
                                    <td width="80%"><?php echo htmlspecialchars($nama); ?></td>
                                </tr>
                                <tr>
                                    <td width="20%"><strong>Username</strong></td>
                                    <td width="80%"><?php echo htmlspecialchars($email ?? ''); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('admin/includes/footer.php'); ?>
<?php include('admin/includes/script.php'); ?>
