<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="dist/img/LogoPolinema.png" alt="logo Polinema" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>Admin Survey</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
     <!-- Sidebar user panel (optional) -->
       <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block"><b><?php echo isset($_SESSION['nama']) ? $_SESSION['nama'] : 'Guest';?></b></a>
            </div>
        </div>
        
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a a href="dashboard.php" class="nav-link <?php echo ($menu == 'index') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="m_user.php" class="nav-link <?php echo ($menu == 'm_user') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="m_kategori.php" class="nav-link <?php echo ($menu == 'm_kategori') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Kategori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="m_survey.php" class="nav-link <?php echo ($menu == 'm_survey') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Survey</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="m_survey_soal.php" class="nav-link <?php echo ($menu == 'm_survey_soal') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>Soal Survey</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?php echo ($menu == 'mahasiswa' || $menu == 'dosen' || $menu == 'tendik' || $menu == 'ortu' || $menu == 'alumni'|| $menu == 'industri') ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>Responden <i class="fas fa-angle-left right"></i><span class="badge badge-info right"></span></p>
                    </a>
                    <ul class="nav nav-treeview">
                    <li class="nav-item">
                            <a href="t_responden_mahasiswa.php" class="nav-link <?php echo ($menu == 'mahasiswa') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Mahasiswa</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="t_responden_dosen.php" class="nav-link <?php echo ($menu == 'dosen') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dosen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="t_responden_tendik.php" class="nav-link <?php echo ($menu == 'tendik') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tendik</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="t_responden_ortu.php" class="nav-link <?php echo ($menu == 'ortu') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Orang Tua</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="t_responden_alumni.php" class="nav-link <?php echo ($menu == 'alumni') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Alumni</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="t_responden_industri.php" class="nav-link <?php echo ($menu == 'industri') ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Industri</p>
                            </a>
                        </li>
                        <!-- Tambahkan menu lainnya sesuai kebutuhan -->
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
