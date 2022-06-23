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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('sirkulasi/hitory'); ?>">Sirkulasi</a></li>
                        <li class="breadcrumb-item active"><?php echo $page; ?></li>
                    </ol>
                </div>
            </div>
            <a href="<?php echo base_url('sirkulasi'); ?>" class="btn bg-gradient-success btn-sm mb-2"></i> Selesai Transaksi</a>
            <!-- Sweatalert -->
            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>
            <!-- /.Swealert -->
            <hr>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <h3 class="timeline-header">Transaksi dengan: <?php echo $this->uri->segment(4); ?></h3>
                    <div class="card">
                        <!-- <div class="card-header">
                            <h3 class="card-title">Daftar Barang yang dipinjam</h3>
                        </div> -->
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class>Nama Barang</th>
                                        <th class>Peminjam Barang</th>
                                        <th class>Unit</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($barang_invoice as $row) : ?>
                                        <tr>
                                            <td width="50" class="text-center"><?php echo $no; ?></td>
                                            <td><?php echo $row['nama_barang']; ?></td>
                                            <td><?php echo $row['penerima_barang']; ?></td>
                                            <td><?php echo $row['unit']; ?></td>
                                            <td class="text-center" width="10">
                                                <a href="<?php echo base_url('sirkulasi/action_kembali/' . $row['id_sirkulasi'] . '/' . $this->uri->segment(4) . '/' . $row['invoice']); ?>" class="btn btn-xs bg-info" data-toggle="tooltip" data-placement="top" title="kembali">
                                                    <i class="fas fa-reply"></i>
                                                </a>
                                            </td>
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