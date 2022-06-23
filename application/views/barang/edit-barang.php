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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('masterdata/barang'); ?>">Data Barang</a></li>
                        <li class="breadcrumb-item active"><?php echo $page; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <hr>
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
                        <?php echo form_open_multipart('masterdata/edit_barang/' . $barang['kode_barang']); ?>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="kode_barang">Kode Barang</label>
                                    <input type="text" class="form-control" name="kode_barang" id="kode_barang" value="<?php echo $barang['kode_barang']; ?>">
                                    <?php echo form_error('kode_barang', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="<?php echo $barang['nama_barang']; ?>">
                                    <?php echo form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="jenis">Jenis</label>
                                    <select name="jenis" id="jenis" class="form-control">
                                        <option value="">- Pilih jenis -</option>
                                        <?php foreach ($jenis as $j) : ?>
                                            <option value="<?php echo $j['id_jenis']; ?>" <?php echo $j['id_jenis'] == $barang['jenis_id'] ? "selected" : ''; ?>><?php echo $j['nama_jenis']; ?>
                                            <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('jenis', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="satuan">Satuan</label>
                                    <input type="text" class="form-control" name="satuan" id="satuan" value="<?php echo $barang['satuan']; ?>">
                                    <?php echo form_error('satuan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <button type="submit" class="btn bg-gradient-success">Update</button>
                            <a href="<?php echo base_url('masterdata/barang'); ?>" class="btn bg-gradient-primary">Kembali</a>
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