<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"><?php echo $page; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
                        <li class="breadcrumb-item active"><?php echo $page; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <hr>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <!-- Admin Kerumahtanggaan -->
    <?php if ($user['id_user'] == 1) : ?>
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="<?php echo base_url('masterdata/barang'); ?>">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-dark">Total Barang</span>
                                    <span class="info-box-number text-dark">
                                        <?php echo $jml_barang; ?>
                                        <!-- <small>%</small> -->
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </a>
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="<?php echo base_url('transaksi/bm'); ?>">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-dark">Transaksi Barang Masuk</span>
                                    <span class="info-box-number text-dark"><?php echo $barang_masuk; ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </a>
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="<?php echo base_url('transaksi/bk'); ?>">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-dark">Transaksi Barang Keluar</span>
                                    <span class="info-box-number text-dark"><?php echo $barang_keluar; ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="<?php echo base_url('masterdata/pegawai'); ?>">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-dark">Pegawai</span>
                                    <span class="info-box-number text-dark"><?php echo $pegawai; ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-md-6">
                        <!-- AREA CHART -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Grafik Transaksi Barang Keluar Tahun <?php echo date('Y'); ?></h3>

                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="areaChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.col (LEFT) -->
                    <div class="col-md-6">

                    </div><!-- /.col (RIGHT) -->
                </div>
                <!-- /.row -->

            </div>
            <!--/. container-fluid -->
        </section>
    <?php elseif ($user['id_user'] == 2) : ?>
        <!-- Admin STM -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="<?php echo base_url('stm/admin/pembayaran'); ?>">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-dark">Total Iuran STM</span>
                                    <span class="info-box-number text-dark">Rp. <?php echo number_format($kas['total_kas']); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="<?php echo base_url('stm/admin/history'); ?>">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-hand-holding-usd"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-dark">Total Pengeluaran</span>
                                    <span class="info-box-number text-dark">Rp. <?php echo number_format($totserah['total_serah_stm']); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </a>
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="<?php echo base_url('stm/admin/history'); ?>">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="far fa-credit-card"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-dark">Pengeluaran STM</span>
                                    <span class="info-box-number text-dark"><?php echo $pengeluaran; ?>x Pengeluaran</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="#">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-dollar-sign"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-dark">Sisa Kas</span>
                                    <span class="info-box-number text-dark">Rp. <?php echo number_format(($kas['total_kas'] - $totserah['total_serah_stm'])); ?></span>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
                <!-- /.row -->
            </div>
            <!--/. container-fluid -->
        </section>
    <?php elseif ($user['id_user'] == 3) : ?>
        <!-- Admin INFAQ -->
        <section class="content">
            <div class="container-fluid">
                <!-- Info boxes -->
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="#">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-dollar-sign"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-dark">Total Infaq Terkumpul</span>
                                    <span class="info-box-number text-dark">Rp. <?php echo number_format($terkumpul['total_terkumpul']); ?></span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- /.col -->
                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="#">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-hand-holding-usd"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-dark">Total Dana Serah</span>
                                    <span class="info-box-number text-dark">Rp. <?php echo number_format($serah_infaq['total_serah']); ?></span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </a>
                    </div>
                    <!-- /.col -->

                    <!-- fix for small devices only -->
                    <div class="clearfix hidden-md-up"></div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="<?php echo base_url('infaq/admin/history'); ?>">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="far fa-credit-card"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-dark">Serah Dana Infaq</span>
                                    <span class="info-box-number text-dark"><?php echo $infaq_keluar; ?>x Penyerahan</span>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-12 col-sm-6 col-md-3">
                        <a href="#">
                            <div class="info-box">
                                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text text-dark">Infaq Belum diserahkan</span>
                                    <span class="info-box-number text-dark">Rp. <?php echo number_format($belum_serah); ?>

                                        <!-- <small>%</small> -->
                                    </span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </a>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!--/. container-fluid -->
        </section>
    <?php endif; ?>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->