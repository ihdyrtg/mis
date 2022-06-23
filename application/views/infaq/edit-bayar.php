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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('infaq/admin/pembayaran'); ?>">Daftar Pembayaran</a></li>
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
                        <?php echo form_open_multipart('infaq/admin/edit_bayar/' . $infaq['id_infaq']); ?>
                        <input type="hidden" name="id_infaq" id="id_infaq" value="<?php echo $infaq['id_infaq']; ?>">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="id_pegawai">Pegawai*</label>
                                    <select name="id_pegawai" id="id_pegawai" class="form-control chosen">
                                        <option value="">- Pilih Pegawai -</option>
                                        <?php foreach ($pegawai as $p) : ?>
                                            <option value="<?php echo $p['id_pegawai']; ?>" <?php echo $p['id_pegawai'] == $infaq['pegawai_id'] ? "selected" : ''; ?>><?php echo $p['nama_pegawai']; ?>
                                            <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('id_pegawai', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="jumlah">Jumlah*</label>
                                    <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="20000" value="<?php echo $infaq['jumlah']; ?>">
                                    <?php echo form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea name="keterangan" id="keterangan" cols="30" rows="3" class="form-control"><?php echo $infaq['keterangan']; ?></textarea>
                                    <?php echo form_error('keterangan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm bg-gradient-success">Update</button>
                            <a href="<?php echo base_url('infaq/admin/pembayaran'); ?>" class="btn btn-sm bg-gradient-primary">Kembali</a>
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