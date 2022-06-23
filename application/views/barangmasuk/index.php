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
            <a href="<?php echo base_url('transaksi/inisialisasi'); ?>" class="btn bg-gradient-success btn-sm mb-2"><i class="fas fa-plus"></i> Barang Masuk</a>
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
                                        <th class="text-center" rowspan="2">No.</th>
                                        <th class="text-center" rowspan="2">Kode Barang</th>
                                        <th class="text-center" rowspan="2">Nama Barang</th>
                                        <th class="text-center" rowspan="2">Jumlah</th>
                                        <th class="text-center" colspan="2">Kondisi</th>
                                        <th class="text-center" rowspan="2">Tanggal Masuk</th>
                                        <th class="text-center" rowspan="2">Action</th>
                                    </tr>
                                    <tr>
                                        <th class="text-center">Bagus</th>
                                        <th class="text-center">Rusak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($barang_masuk as $bm) : ?>
                                        <tr>
                                            <td width="50" class="text-center"><?php echo $no; ?></td>
                                            <td><?php echo $bm['barang_kode']; ?></td>
                                            <td><?php echo $bm['nama_barang']; ?></td>
                                            <td class="text-center"><?php echo $bm['jumlah']; ?></td>
                                            <td class="text-center"><?php echo $bm['bagus']; ?></td>
                                            <td class="text-center"><?php echo $bm['rusak']; ?></td>
                                            <td class="text-center"><?php echo tgl_bulan($bm['tanggal_masuk']); ?></td>
                                            <td width="70">
                                                <a href="<?php echo base_url('transaksi/edit_bm/' . $bm['id_bm']); ?>" class="btn btn-sm bg-teal" data-toggle="tooltip" data-placement="top" title="edit">
                                                    <i class="fas fa-pen-square"></i>
                                                </a>
                                                <a href="<?php echo base_url('transaksi/delete_bm/' . $bm['id_bm']); ?>" class="btn btn-sm bg-danger tombol-hapus" data-toggle="tooltip" data-placement="top" title="delete">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
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
                                        <th colspan="2"></th>
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