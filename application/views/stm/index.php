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
            <div class="row">
                <div class="col-md-7">
                    <a href="<?php echo base_url('stm/admin/bayar'); ?>" class="btn bg-gradient-success btn-sm mb-2"><i class="fas fa-plus"></i> Bayar STM Bulanan</a>
                    <a href="<?php echo base_url('stm/admin/history'); ?>" class="btn bg-gradient-primary btn-sm mb-2"><i class="fas fa-history"></i> Riwayat Serah STM</a>
                </div>

                <div class="col-md-5">
                    <div class="form-group mr-2">
                        <form action="<?php echo base_url('stm/admin/laporan'); ?>" method="post">
                            <div class="form-row">
                                <div class="col-md-5"></div>
                                <div class="form-group col-md-5">
                                    <select name="tahun" id="tahun" class="form-control" required>
                                        <option value="">- Laporan Tahunan -</option>
                                        <?php foreach ($tahun as $t) : ?>
                                            <option value="<?php echo $t['tahun']; ?>"><?php echo $t['tahun']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('tahun1', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-sm bg-gradient-info"><i class="fas fa-print"></i>Print</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
                            <!-- <h3 class="card-title"></h3> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th>STM</th>
                                        <th>Nama Pegawai</th>
                                        <th>Keterangan</th>
                                        <th>Jumlah</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($stm as $row) : ?>
                                        <tr>
                                            <td class="text-center" width="50"><?php echo $no; ?></td>
                                            <td><?php echo hanya_bulan($row['tanggal_bayar']); ?></td>
                                            <td><?php echo $row['nama_pegawai']; ?></td>
                                            <td><?php echo $row['keterangan']; ?></td>
                                            <td>Rp. <?php echo number_format($row['jumlah']); ?></td>
                                            <?php if ($user['id_user'] == 2) : ?>
                                                <td width="50">
                                                    <a href="<?php echo base_url('stm/admin/edit_bayar/' . $row['id_stm']); ?>" class="btn btn-xs bg-teal" data-toggle="tooltip" data-placement="top" title="edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('stm/admin/delete_bayar/' . $row['id_stm']); ?>" class="btn btn-xs bg-danger tombol-hapus" data-toggle="tooltip" data-placement="top" title="delete">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <th colspan="4" class="text-right">Total</th>
                                    <th>Rp. <?php echo number_format($kas['total_kas']); ?></th>
                                    <th></th>
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