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
                        <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active"><?php echo $page; ?></li>
                    </ol>
                </div>
            </div>
            <hr>
            <a href="<?php echo base_url('info/barang_kosong'); ?>" class="btn bg-gradient-danger btn-sm mb-2"><i class="fas fa-folder-open"></i> Lihat Barang Kosong
                <span class="badge badge-warning right"><?php echo $barang_kosong; ?></span>
            </a>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Sweatalert -->
    <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>
    <!-- /.Swealert -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <div class="card">
                        <div class="card-header">
                            <!-- <h3 class="card-title">DataTable with default features</h3> -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Nama Barang</th>
                                        <th class="text-center">Tersedia</th>
                                        <th class="text-center">Rusak</th>
                                        <th class="text-center">Keterangan</th>
                                        <th class="text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($tersedia as $t) : ?>
                                        <tr>
                                            <td width="50" class="text-center"><?php echo $no; ?></td>
                                            <td><?php echo $t['nama_barang']; ?></td>
                                            <td class="text-center"><?php echo $t['jml_tersedia']; ?> <?php echo $t['satuan']; ?></td>
                                            <td class="text-center"><?php echo $t['jml_rusak']; ?> <?php echo $t['satuan']; ?></td>
                                            <td class="text-center"><?php echo $t['keterangan']; ?></td>
                                            <td width="50">
                                                <a href="<?php echo base_url('info/keterangan/' . $t['id_tersedia']); ?>" class="btn btn-sm bg-teal" data-toggle="tooltip" data-placement="top" title="tambah keterangan">
                                                    <i class="fas fa-pen"></i>
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