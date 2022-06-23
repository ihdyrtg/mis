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
                <!-- left column -->
                <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-success">
                        <div class="card-header">
                            <!-- <h3 class="card-title"></h3> -->
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="kode_barang">Kode Barang</label>
                                    <input type="text" class="form-control" name="kode_barang" id="kode_barang" value="<?php echo $cekbarang['kode_barang']; ?>" readonly>
                                    <?php echo form_error('kode_barang', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="nama_barang">Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="<?php echo $cekbarang['nama_barang']; ?>" readonly>
                                    <?php echo form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <form action="<?php echo base_url('info/action_lokbarang'); ?>" method="post">
                                <input type="hidden" name="barang_kode" id="barang_kode" value="<?php echo $this->uri->segment(3); ?>">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Lokasi</th>
                                            <th>Jumlah</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="formtambah">
                                        <tr>
                                            <td>
                                                <select name="ruang[]" id="ruang[]" class="form-control">
                                                    <option value="">- Pilih Lokasi -</option>
                                                    <?php foreach ($ruang as $r) : ?>
                                                        <option value="<?php echo $r['id_ruang']; ?>"><?php echo $r['nama_ruang']; ?>
                                                        <?php endforeach; ?>
                                                </select>
                                            </td>
                                            <td>
                                                <input type="text" name="jumlah[]" id="jumlah[]" class="form-control">
                                            </td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm bg-gradient-primary btnaddform"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn bg-gradient-success mt-2 btnsimpanbanyak">Tambah</button>
                            </form>
                        </div>
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