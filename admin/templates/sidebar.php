<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="." class="brand-link">
        <img src="dist/img/favicon.svg" alt="NyilihBayarID" class="brand-image" style="opacity: .8">
        <span class="brand-text font-weight-light">NyilihBayarID</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user-admin.png" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="d-block"><?php echo $_SESSION['admin_username']; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="riwayat-transaksi.php" class="nav-link">
                        <i class="nav-icon fas fa-money-bill-alt"></i>
                        <p>
                            Riwayat Transaksi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="penyewa.php" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Penyewa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="paket-sewa.php" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p>
                            Paket Sewa
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="kode-akses.php" class="nav-link">
                        <i class="nav-icon fas fa-key"></i>
                        <p>
                            Kode Akses
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Data Buku
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="detail-buku.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Detail Buku</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="bahasa.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bahasa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="kategori.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori Buku</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="penerbit.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Penerbit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pengarang.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengarang</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item mt-auto">
                    <a href="modules/logout.php" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Keluar
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>