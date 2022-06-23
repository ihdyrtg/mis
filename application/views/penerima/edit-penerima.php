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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('masterdata/penerima'); ?>">Pegawai IAIN PSP</a></li>
                        <li class="breadcrumb-item active"><?php echo $page; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <hr>
            <!-- <div class="callout callout-info">
                <p><i class="fas fa-info"></i> Note: Acuan kode barang</p>
                <i class="fas fa-circle"></i> <a href="https://www.scribd.com/doc/240194929/nomor-kode-barang" target="_blank" style="text-decoration: none;">Kode inventaris</a>
                <i class="fas fa-circle"></i> <a href="https://www.scribd.com/document/379265149/Acuan-Kode-Barang-ATK" target="_blank" style="text-decoration: none;">Kode ATK</a>
            </div> -->
            <?php echo $this->session->flashdata('message'); ?>
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
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?php echo form_open_multipart('masterdata/edit_penerima/' . $penerima['id_penerima']); ?>
                        <input type="hidden" name="id_penerima" id="id_penerima" value="<?php echo $penerima['id_penerima']; ?>">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="nama_penerima">Nama Pegawai</label>
                                    <input type="text" class="form-control" name="nama_penerima" id="nama_penerima" placeholder="Nama pegawai" value="<?php echo $penerima['nama_penerima']; ?>">
                                    <?php echo form_error('nama_penerima', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <button type="submit" class="btn bg-gradient-success">Update</button>
                            <a href="<?php echo base_url('masterdata/penerima'); ?>" class="btn bg-gradient-primary">Kembali</a>
                        </div>
                        <?php echo form_close(); ?>
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