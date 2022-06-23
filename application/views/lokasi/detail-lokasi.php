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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('info/lokasi'); ?>">Barang Teridentifikasi</a></li>
                        <li class="breadcrumb-item active"><?php echo $page; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <hr>
            <!-- Sweatalert -->
            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>
            <!-- /.Swealert -->

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

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
                                        <th>Detail lokasi : <?php echo $barang['nama_barang']; ?></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($lokasi_barang as $row) : ?>
                                        <tr>
                                            <td>Ruang [<?php echo $row['nama_ruang']; ?> <?php echo $row['jumlah']; ?> <?php echo $row['satuan']; ?>]</td>
                                            <td class="text-center">
                                                <a href="<?php echo base_url('info/edit_lokasi/' . $row['id_lokasi']); ?>" class="btn btn-sm bg-teal tombol-edit" data-toggle="tooltip" data-placement="top" title="edit">
                                                    <i class="fas fa-pen-square"></i>
                                                </a>

                                                <a href="<?php echo base_url('info/delete_lokasi/' . $row['id_lokasi']); ?>" class="btn btn-sm bg-danger tombol-hapus" data-toggle="tooltip" data-placement="top" title="delete">
                                                    <i class="fas fa-trash"></i>
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

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->