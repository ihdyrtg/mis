<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <!-- <h1><?php echo $page; ?></h1> -->
                </div>
                <div class="col-sm-8">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('pelaporan/masuk'); ?>">Laporan Barang Masuk</a></li>
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
                                <a href="<?php echo base_url('pelaporan/masuk'); ?>" class="btn btn-sm btn-primary"><i class="fas fa-backward"></i> Kembali</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <p class="text-bold text-center">Daftar Barang Masuk UPT Pusat Perpustakaan IAIN Padangsidimpuan<br>
                                <?php echo $page; ?>
                            </p>
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" rowspan="2">No.</th>
                                        <th class="text-center" rowspan="2">Tanggal Masuk</th>
                                        <th class="text-center" rowspan="2">Nama Barang</th>
                                        <th class="text-center" rowspan="2">Jumlah</th>
                                        <th class="text-center" colspan="2">Kondisi</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Bagus</th>
                                        <th class="text-center">Rusak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($datafilter as $df) : ?>
                                        <tr>
                                            <td width="50" class="text-center"><?php echo $no; ?></td>
                                            <td class="text-center"><?php echo tgl_bulan($df['tanggal_masuk']); ?></td>
                                            <td><?php echo $df['nama_barang']; ?></td>
                                            <td class="text-center"><?php echo $df['jumlah']; ?></td>
                                            <td class="text-center"><?php echo $df['bagus']; ?></td>
                                            <td class="text-center"><?php echo $df['rusak']; ?></td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="3" class="text-center">Total</th>
                                        <th class="text-center"><?php echo $total_masuk['jumlah']; ?></th>
                                        <th class="text-center"><?php echo $total_bagus['bagus']; ?></th>
                                        <th class="text-center"><?php echo $total_rusak['rusak']; ?></th>
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