<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-1">
                <div class="col-sm-6">
                    <h1 class="m-0 pb-1"><?php echo $page; ?></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('transaksi/bk'); ?>">Barang Keluar</a></li>
                        <li class="breadcrumb-item active"><?php echo $page; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <hr>
            <!-- Sweatalert -->
            <div class="data-flash" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>
            <!-- /.Swealert -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-success">
                        <div class="card-header">
                            <!-- <h3 class="card-title"></h3> -->
                        </div>
                        <form action="<?php echo base_url('transaksi/edit_bk/' . $bkeluar['id_keluar']); ?>" method="post">
                            <input type="hidden" name="id_pegawai" id="id_pegawai" value="<?php echo $this->uri->segment(3); ?>">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="kode_barang">Kode Barang</label>
                                        <input type="text" class="form-control" name="kode_barang" id="kode_barang" value="<?php echo $bkeluar['barang_kode']; ?>" readonly>
                                        <?php echo form_error('kode_barang', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="jumlah">Jumlah</label>
                                        <input type="text" class="form-control" name="jumlah" id="jumlah" value="<?php echo $bkeluar['jumlah']; ?>">
                                        <?php echo form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="tanggal_keluar">Tanggal Keluar</label>
                                        <input type="date" class="form-control" name="tanggal_keluar" id="tanggal_keluar" value="<?php echo $bkeluar['tanggal_keluar']; ?>">
                                        <?php echo form_error('tanggal_keluar', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn bg-gradient-success">Edit</button>
                                <a href="<?php echo base_url('transaksi/bk'); ?>" class="btn bg-gradient-primary">Kembali</a>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-6">

                </div>
                <!--/.col (right) -->
            </div>
            <!-- /.row -->

        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->