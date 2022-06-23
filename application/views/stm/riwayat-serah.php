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
                <div class="col-md-7"></div>

                <div class="col-md-5">
                    <div class="form-group mr-2">
                        <form action="<?php echo base_url('stm/admin/laporan_bulanan'); ?>" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <select name="bulan" id="bulan" class="form-control" required>
                                        <option value="">- Pilih Bulan -</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                    <?php echo form_error('bulan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-5">
                                    <select name="tahun" id="tahun" class="form-control" required>
                                        <option value="">- Pilih Tahun -</option>
                                        <?php foreach ($tahun as $t) : ?>
                                            <option value="<?php echo $t['tahun']; ?>"><?php echo $t['tahun']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('tahun', '<small class="text-danger">', '</small>'); ?>
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
                                        <th>Tanggal Serah</th>
                                        <th>Kepada</th>
                                        <th>Jumlah</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($serah as $row) : ?>
                                        <tr>
                                            <td class="text-center" width="50"><?php echo $no; ?></td>
                                            <td><?php echo tgl_bulan($row['tanggal_serah']); ?></td>
                                            <td><?php echo $row['nama_pegawai']; ?></td>
                                            <td>Rp. <?php echo number_format($row['jumlah_serah']); ?></td>
                                            <?php if ($user['id_user'] == 2) : ?>
                                                <td class="text-center" width="50">
                                                    <a href="<?php echo base_url('stm/admin/prints/' . $row['id_serah']); ?>" class="btn btn-xs bg-info" data-toggle="tooltip" data-placement="top" title="print">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot>
                                    <th colspan="3" class="text-right">Total</th>
                                    <th>Rp. <?php echo number_format($total_serah['total_serah_stm']); ?></th>
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