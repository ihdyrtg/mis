<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $page; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active"><?php echo $page; ?></li>
                    </ol>
                </div>
            </div>
            <hr>
            <a href="<?php echo base_url('transaksi/authpegawai'); ?>" class="btn bg-gradient-success btn-sm mb-2"><i class="fas fa-plus"></i> Mulai Transaksi</a>
            <!-- <a href="<?php echo base_url('transaksi/cekpegawai'); ?>" class="btn bg-gradient-info btn-sm mb-2"><i class="fas fa-plus"></i> Banyak Transaksi</a> -->
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
                            <!-- <h3 class="card-title">DataTable with minimal features & hover style</h3> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Tanggal Keluar</th>
                                        <th class="text-center">Nama Barang</th>
                                        <th class="text-center">Pegawai</th>
                                        <th class="text-center">Unit</th>
                                        <th class="text-center">Jumlah</th>
                                        <th class="text-center" width="50">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($barang_keluar as $bk) : ?>
                                        <tr>
                                            <td width="50" class="text-center"><?php echo $no; ?></td>
                                            <td class="text-center"><?php echo tgl_bulan($bk['tanggal_keluar']); ?></td>
                                            <td><?php echo $bk['nama_barang']; ?></td>
                                            <td><?php echo $bk['nama_pegawai']; ?></td>
                                            <td class="text-center"><?php echo $bk['nama_bagian']; ?></td>
                                            <td class="text-center"><?php echo $bk['jumlah']; ?> <?php echo $bk['satuan']; ?></td>
                                            <td width="50">
                                                <a href="<?php echo base_url('transaksi/edit_bk/' . $bk['id_keluar']); ?>" class="btn btn-sm bg-teal" data-toggle="tooltip" data-placement="top" title="edit">
                                                    <i class="fas fa-pen-square"></i>
                                                </a>
                                                <a href="<?php echo base_url('transaksi/delete_bk/' . $bk['id_keluar']); ?>" class="btn btn-sm bg-danger" data-toggle="tooltip" data-placement="top" title="delete">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="6" class="text-center">Total</th>
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