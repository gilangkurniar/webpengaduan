<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url() ?>admin/dashboard">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin <sup>Panel</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item <?= $this->uri->segment(2) == 'dashboard' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url() ?>admin/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu Management
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item <?= $this->uri->segment(2) == 'pengaduan' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url() ?>admin/pengaduan">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Pengaduan</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Admin Management
            </div>

            <!-- Nav Item - Tables -->
            <li class="nav-item <?= $this->uri->segment(2) == 'profil' ? 'active' : '' ?>">
                <a class="nav-link" href="<?= base_url('admin/profil') ?>">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Profil</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin/logout') ?>" onclick="return confirm('Apa Anda Yakin ?')">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Log Out</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->