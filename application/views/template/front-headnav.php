<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/'); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/'); ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/template/'); ?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo base_url('assets/template/'); ?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/'); ?>dist/css/adminlte.min.css">
    <!-- Icon -->
    <link rel="icon" href="<?php echo base_url('assets/img/icon.png'); ?>">
</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container-fluid">
                <a href="<?php echo base_url(); ?>" class="navbar-brand">
                    <img src="<?php echo base_url('assets/img/icon.png'); ?>" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light"><b>Management Inventory System</b></span>
                </a>

                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item <?php if ($this->uri->segment(1) == '' or $this->uri->segment(2) == 'home') echo 'active'; ?>">
                            <a href="<?php echo base_url(); ?>" class="nav-link">Data Barang</a>
                        </li>
                        <!-- <li class="nav-item <?php if ($this->uri->segment(1) == 'home' && $this->uri->segment(2) == 'habis') echo 'active'; ?>">
                            <a href="<?php echo base_url('home/habis'); ?>" class="nav-link">Barang Habis</a>
                        </li>
                        <li class="nav-item <?php if ($this->uri->segment(1) == 'home' && $this->uri->segment(2) == 'berlangsung') echo 'active'; ?>">
                            <a href="<?php echo base_url('home/berlangsung'); ?>" class="nav-link">Barang Tidak Habis</a>
                        </li> -->
                        <li class="nav-item <?php if ($this->uri->segment(1) == 'home' && $this->uri->segment(2) == 'transaksipegawai') echo 'active'; ?> || <?php if ($this->uri->segment(1) == 'home' && $this->uri->segment(2) == 'detail') echo 'active'; ?>">
                            <a href="<?php echo base_url('home/transaksipegawai'); ?>" class="nav-link">Transaksi Pegawai</a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo base_url('auth'); ?>" class="nav-link">Login</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- /.navbar -->