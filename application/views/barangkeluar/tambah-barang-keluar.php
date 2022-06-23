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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('transaksi/bk'); ?>">Barang Keluar</a></li>
                        <li class="breadcrumb-item active"><?php echo $page; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <hr>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <!-- left column -->
                <div class="col-md-4">
                    <!-- jquery validation -->
                    <div class="card card-success">
                        <div class="card-header">
                            <!-- <h3 class="card-title"></h3> -->
                        </div>
                        <form action="<?php echo base_url('transaksi/actiontambah_bk'); ?>" method="post">
                            <input type="hidden" name="id_pegawai" id="id_pegawai" value="<?php echo $this->uri->segment(4); ?>">
                            <div class="card-body">
                                <table class="table table-sm table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Kode Barang</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Keluar</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="formtambah">
                                        <tr>
                                            <td><input type="text" name="kode_barang[]" id="kode_barang[]" class="form-control"><?php echo form_error('kode_barang', '<small class="text-danger">', '</small>'); ?></td>
                                            <td><input type="text" name="jumlah[]" id="jumlah[]" class="form-control"></td>
                                            <td><input type="date" name="tanggal_keluar[]" id="tanggal_keluar[]" class="form-control"></td>
                                            <td><input type="text" name="keterangan[]" id="keterangan[]" class="form-control"></td>
                                            <td class="text-center">
                                                <button type="button" class="btn btn-sm bg-gradient-primary btnaddform"><i class="fa fa-plus"></i></button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <button type="submit" class="btn btn-sm bg-gradient-primary mt-2 btnsimpanbanyak">Simpan</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <div class="col-md-4">

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