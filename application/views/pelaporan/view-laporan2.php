<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1><?php echo $page; ?></h1> -->
                </div>
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('pelaporan/keluar'); ?>">Laporan Barang Keluar</a></li>
                        <li class="breadcrumb-item active"><?php echo $page; ?></li>
                    </ol>
                </div>
            </div>
            <!-- Sweatalert -->
            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>
            <!-- /.Swealert -->
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-right">
                                <a href="<?php echo base_url('pelaporan/keluar'); ?>" class="btn btn-sm btn-primary"><i class="fas fa-backward"></i> Kembali</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <p class="text-bold text-center">Daftar Barang Keluar UPT Pusat Perpustakaan IAIN Padangsidimpuan<br>
                                <?php echo $page; ?>
                            </p>
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Tanggal Keluar</th>
                                        <th class="text-center">Nama Barang</th>
                                        <th class="text-center">Transaksi Dengan</th>
                                        <th class="text-center">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($datafilter as $df) : ?>
                                        <tr>
                                            <td width="50" class="text-center"><?php echo $no; ?></td>
                                            <td class="text-center"><?php echo tgl_bulan($df['tanggal_keluar']); ?></td>
                                            <td><?php echo $df['nama_barang']; ?></td>
                                            <td class="text-center"><?php echo $df['nama_pegawai']; ?></td>
                                            <td class="text-center"><?php echo $df['jumlah']; ?></td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4" class="text-right">Total</th>
                                        <th class="text-center"><?php echo $total_keluar['total']; ?></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->