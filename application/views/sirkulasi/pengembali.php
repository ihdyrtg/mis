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
            <!-- Sweatalert -->
            <div class="data-flash" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>
            <!-- /.Swealert -->
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
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url('sirkulasi/pengembali'); ?>" method="post">
                            <input type="hidden" name="invoice" id="invoice" value="<?php echo $this->uri->segment(3); ?>">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="pengembali">Pengembali Barang</label>
                                        <!-- Aktifkan form input di bawah jika transaksi menggunakan scanner
                                        <input type="text" class="form-control" name="pengembali" id="pengembali" placeholder="Id pegawai" value="<?php echo set_value('pengembali'); ?>" autofocus> -->
                                        <!-- Start select chosen -->
                                        <select id="pengembali" name="pengembali" class="form-control chosen">
                                            <?php foreach ($penerima as $row) : ?>
                                                <option value="<?php echo $row['nama_penerima']; ?>"><?php echo $row['nama_penerima']; ?> - <?php echo $row['nama_penerima']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <!-- End select chosen -->
                                        <?php echo form_error('pengembali', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm bg-gradient-success">Proses</button>
                                <a href="<?php echo base_url('sirkulasi'); ?>" class="btn btn-sm bg-gradient-primary">Kembali</a>
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