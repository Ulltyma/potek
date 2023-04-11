<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-navy navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= base_url('admin/dashboard')?>" class="nav-link">Home</a>
        </li>
      </li>
    </ul>
    <marquee class="nav-link"> 
      <h5>Selamat Datang Di Aplikasi Apotek</h5>
    </marquee>

  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-navy  elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('admin/dashboard')?>" class="brand-link">
      <img src="<?= base_url('assets/template/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-dark">Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

          <li class="nav-item">
            <a href="<?= base_url('admin/dashboard') ?>" class="nav-link <?php if($this->uri->segment(1) == 'admin/dashboard') echo 'active' ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>Dashboard</p>
            </a>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-bahai"></i>
                <p>
                   Data Master
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('admin/kelola_user') ?>" class="nav-link <?php if($this->uri->segment(1) == 'admin/kelola_user') echo 'active' ?>">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Data User</p>
                  </a>
                </li>

                <li class="nav-item">
                  <a href="<?= base_url('admin/kelola_obat') ?>" class="nav-link <?php if($this->uri->segment(1) == 'admin/kelola_obat') echo 'active' ?>">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Obat</p>
                  </a>
                </li>
              </ul>
                <li class="nav-item">
                <a href="<?= base_url('admin/kelola_laporan') ?>" class="nav-link <?php if($this->uri->segment(1) == 'admin/kelola_laporan') echo 'active' ?>">
                  <i class="nav-icon fas fa-comments"></i>
                  <p>Laporan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('auth/logout') ?>" class="nav-link">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>Logout</p>
                </a>
              </li>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
          <!-- Content Header (Page header) -->
          <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
                  <h1 class="m-0"><?= $title ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= base_url('admin/dashboard')?>">Home</a></li>
                    <li class="breadcrumb-item active"><?= $title ?></li>
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
          <!-- /.content-header -->

          <!-- Main content -->
          <div class="content">
            <div class="container-fluid">