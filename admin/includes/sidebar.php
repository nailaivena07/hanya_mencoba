    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="home.php" class="brand-link text-center">
            <span class="brand-text font-weight-light"><b>Admin</b>Blog</span>
        </a>
        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu">
                    <li class="nav-item">
                        <a href="profil.php" class="nav-link <?php echo (basename($_SERVER['PHP_SELF'])=='profil.php'||basename($_SERVER['PHP_SELF'])=='editprofil.php') ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Profil</p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview <?php echo in_array(basename($_SERVER['PHP_SELF']),['home.php','tambahkategoriblog.php','editkategoriblog.php']) ? 'menu-open' : ''; ?>">
                        <a href="#" class="nav-link <?php echo in_array(basename($_SERVER['PHP_SELF']),['home.php','tambahkategoriblog.php','editkategoriblog.php']) ? 'active' : ''; ?>">
                            <i class="nav-icon fas fa-database"></i>
                            <p>Data Master <i class="right fas fa-angle-left"></i></p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="home.php" class="nav-link <?php echo in_array(basename($_SERVER['PHP_SELF']),['home.php','tambahkategoriblog.php','editkategoriblog.php']) ? 'active' : ''; ?>">
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
