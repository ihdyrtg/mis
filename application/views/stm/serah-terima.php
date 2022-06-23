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
                        <?php echo form_open_multipart('stm/admin/serah'); ?>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="tanggal_serah">Tanggal Serah*</label>
                                    <input type="date" class="form-control" name="tanggal_serah" id="tanggal_serah" placeholder="100000">
                                    <?php echo form_error('tanggal_serah', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="jumlah">Jenis STM*</label>
                                    <select name="jumlah" id="jumlah" class="form-control">
                                        <option value="">- Pilih Jenis STM -</option>
                                        <option value="150000">Melahirkan</option>
                                        <option value="200000">Menikah</option>
                                        <option value="400000">Meninggal</option>
                                        <option value="150000">Sakit</option>
                                    </select>
                                    <?php echo form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="id_pegawai">Kepada*</label>
                                    <select name="id_pegawai" id="id_pegawai" class="form-control chosen">
                                        <option value="">- Pilih Pegawai -</option>
                                        <?php foreach ($pegawai as $row) : ?>
                                            <option value="<?php echo $row['id_pegawai']; ?>"><?php echo $row['nama_pegawai']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('id_pegawai', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="terbilang">Jenis Serah*</label>
                                    <select name="terbilang" id="terbilang" class="form-control">
                                        <option value="">- Pilih Jenis -</option>
                                        <option value="Uang">Berupa Uang</option>
                                        <option value="Barang">Berupa Barang</option>
                                    </select>
                                    <?php echo form_error('terbilang', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm bg-gradient-success">Tambah</button>
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