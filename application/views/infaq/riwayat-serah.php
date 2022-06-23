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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('infaq/admin/pembayaran'); ?>">Daftar Pembayaran</a></li>
                        <li class="breadcrumb-item active"><?php echo $page; ?></li>
                    </ol>
                </div>
            </div>
            <hr>

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
                                            <td>Rp. <?php echo number_format($row['jumlah_serah']); ?>
                                            </td>
                                            <?php if ($user['id_user'] == 3) : ?>
                                                <td class="text-center" width="50">
                                                    <a href="<?php echo base_url('infaq/admin/detail_serah/' . $row['id_serah']); ?>" class="btn btn-xs bg-warning" data-toggle="tooltip" data-placement="top" title="detail">
                                                        <i class="fas fa-search"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('infaq/admin/prints/' . $row['id_serah']); ?>" class="btn btn-xs bg-info" data-toggle="tooltip" data-placement="top" title="print">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                        <?php $no++; ?>
                                    <?php endforeach; ?>
                                </tbody>
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