<?php
session_start();
include('koneksi.php');

if (!isset($_SESSION['id_user'])) {
    header("Location: index.php");
    exit;
}

// Hapus kategori blog
if ((isset($_GET['aksi'])) && (isset($_GET['data']))) {
    if ($_GET['aksi'] == 'hapus') {
        $id_kategori_blog = (int)$_GET['data'];
        $sql_dh = "DELETE FROM `kategori_blog` WHERE `id_kategori_blog` = '$id_kategori_blog'";
        mysqli_query($koneksi, $sql_dh);
    }
}

// Pagination
$per_page = 5;
$page     = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset   = ($page - 1) * $per_page;

// Search
$cari = isset($_GET['cari']) ? mysqli_real_escape_string($koneksi, $_GET['cari']) : '';
$where = $cari ? "WHERE kategori_blog LIKE '%$cari%'" : '';

$total_query = mysqli_query($koneksi, "SELECT COUNT(*) FROM kategori_blog $where");
$total_row   = mysqli_fetch_row($total_query);
$total_data  = $total_row[0];
$total_page  = ceil($total_data / $per_page);

$sql_k   = "SELECT id_kategori_blog, kategori_blog FROM kategori_blog $where ORDER BY kategori_blog LIMIT $per_page OFFSET $offset";
$query_k = mysqli_query($koneksi, $sql_k);
?>
<?php $title = 'Kategori Blog'; include('admin/includes/head.php'); ?>
<?php include('admin/includes/header.php'); ?>
<?php include('admin/includes/sidebar.php'); ?>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Page Header -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"><i class="fas fa-list-alt"></i> Kategori Blog</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Kategori Blog</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"><i class="fas fa-list"></i> Daftar Kategori Blog</h3>
                        <div class="card-tools">
                            <a href="tambahkategoriblog.php" class="btn btn-success btn-sm">
                                <i class="fas fa-plus"></i> Tambah Kategori Blog
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Search -->
                        <form method="get" action="home.php" class="mb-3">
                            <div class="input-group" style="max-width:400px;">
                                <input type="text" name="cari" class="form-control" value="<?= htmlspecialchars($cari) ?>">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
                                </div>
                            </div>
                        </form>

                        <!-- Notifikasi -->
                        <div class="col-sm-12">
                            <?php if(!empty($_GET['notif'])){ ?>
                                <?php if($_GET['notif']=="tambahberhasil"){ ?>
                                    <div class="alert alert-success" role="alert">
                                        Data Berhasil Ditambahkan</div>
                                <?php } else if($_GET['notif']=="editberhasil"){ ?>
                                    <div class="alert alert-success" role="alert">
                                        Data Berhasil Diubah</div>
                                <?php } else if($_GET['notif']=="hapusberhasil"){ ?>
                                    <div class="alert alert-success" role="alert">
                                        Data Berhasil Dihapus</div>
                                <?php } ?>
                            <?php } ?>
                        </div>

                        <!-- Tabel -->
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Kategori Blog</th>
                                    <th width="15%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = $offset + 1;
                                while ($data_k = mysqli_fetch_row($query_k)):
                                    $id_kategori_blog = $data_k[0];
                                    $kategori_blog    = $data_k[1];
                                ?>
                                <tr>
                                    <td><?= $no ?>.</td>
                                    <td><?= htmlspecialchars($kategori_blog) ?></td>
                                    <td class="text-center">
                                        <a href="editkategoriblog.php?data=<?= $id_kategori_blog ?>"
                                            class="btn btn-xs btn-info"><i class="fas fa-edit"></i> Edit</a>
                                        <a href="javascript:void(0)"
                                            onclick="if(confirm('Anda yakin ingin menghapus data <?= htmlspecialchars($kategori_blog, ENT_QUOTES) ?>?'))window.location.href='home.php?aksi=hapus&data=<?= $id_kategori_blog ?>&notif=hapusberhasil'"
                                            class="btn btn-xs btn-warning"><i class="fas fa-trash"></i> Hapus</a>
                                    </td>
                                </tr>
                                <?php $no++; endwhile; ?>
                            </tbody>
                        </table>

                        <!-- Pagination -->
                        <?php if ($total_page > 1): ?>
                        <nav>
                            <ul class="pagination pagination-sm justify-content-end">
                                <li class="page-item <?= $page <= 1 ? 'disabled' : '' ?>">
                                    <a class="page-link" href="?page=<?= $page-1 ?>&cari=<?= urlencode($cari) ?>">&laquo;</a>
                                </li>
                                <?php for ($i = 1; $i <= $total_page; $i++): ?>
                                <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                    <a class="page-link" href="?page=<?= $i ?>&cari=<?= urlencode($cari) ?>"><?= $i ?></a>
                                </li>
                                <?php endfor; ?>
                                <li class="page-item <?= $page >= $total_page ? 'disabled' : '' ?>">
                                    <a class="page-link" href="?page=<?= $page+1 ?>&cari=<?= urlencode($cari) ?>">&raquo;</a>
                                </li>
                            </ul>
                        </nav>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('admin/includes/footer.php'); ?>
<?php include('admin/includes/script.php'); ?>
