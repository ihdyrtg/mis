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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('sirkulasi'); ?>">Sirkulasi</a></li>
                        <li class="breadcrumb-item active"><?php echo $page; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <!-- <div class="callout callout-info">
                <p><i class="fas fa-info"></i> Note: Acuan kode barang</p>
                <i class="fas fa-circle"></i> <a href="https://www.scribd.com/doc/240194929/nomor-kode-barang" target="_blank" style="text-decoration: none;">Kode inventaris</a>
                <i class="fas fa-circle"></i> <a href="https://www.scribd.com/document/379265149/Acuan-Kode-Barang-ATK" target="_blank" style="text-decoration: none;">Kode ATK</a>
            </div> -->
            <?php echo $this->session->flashdata('message'); ?>
            <hr>
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
                        <?php echo form_open_multipart('sirkulasi/tambah_sirkulasi'); ?>
                        <input type="hidden" name="id_pegawai" id="id_pegawai" value="<?php echo $pegawai['id_pegawai']; ?>">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <table class="table table-sm table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Kode Barang</th>
                                                <th>Jumlah</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody class="formtambah">
                                            <tr>
                                                <td>
                                                    <select id="kode_barang[]" name="kode_barang[]" class="form-control">
                                                        <?php foreach ($barang as $row) : ?>
                                                            <option value="<?php echo $row['kode_barang']; ?>"><?php echo $row['nama_barang']; ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                    <?php echo form_error('kode_barang', '<small class="text-danger">', '</small>'); ?>
                                                </td>
                                                <td>
                                                    <input type="number" name="jumlah[]" id="jumlah[]" class="form-control" value="1">
                                                </td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-sm bg-gradient-primary btnaddform"><i class="fa fa-plus"></i></button>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="penerima">Penerima Barang</label>
                                    <select id="penerima" name="penerima" class="form-control chosen">
                                        <?php foreach ($penerima as $pen) : ?>
                                            <option value="<?php echo $pen['nama_penerima']; ?>"><?php echo $pen['nama_penerima']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <!-- End select chosen -->
                                    <?php echo form_error('penerima', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="unit">Unit Penerima</label>
                                    <select id="unit" name="unit" class="form-control chosen">
                                        <?php foreach ($unit as $uni) : ?>
                                            <option value="<?php echo $uni['nama_unit']; ?>"><?php echo $uni['nama_unit']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <!-- End select chosen -->
                                    <?php echo form_error('unit', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tanggal_pinjam">Tanggal Pinjam</label>
                                    <input type="date" class="form-control" name="tanggal_pinjam" id="tanggal_pinjam" date-date-format="DD/MM/YYYY" placeholder="dd/mm/yyyy" value="<?php echo set_value('tanggal_pinjam'); ?>" required>
                                    <?php echo form_error('tanggal_pinjam', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tanggal_kembali">Tanggal Kembali</label>
                                    <input type="date" class="form-control" name="tanggal_kembali" id="tanggal_kembali" date-date-format="DD/MM/YYYY" placeholder="dd/mm/yyyy" value="<?php echo set_value('tanggal_kembali'); ?>" required>
                                    <?php echo form_error('tanggal_kembali', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <button type="submit" class="btn bg-gradient-success">Tambah</button>
                            <a href="<?php echo base_url('sirkulasi'); ?>" class="btn bg-gradient-primary">Kembali</a>
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