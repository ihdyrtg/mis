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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('transaksi/bm'); ?>">Barang Masuk</a></li>
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
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?php echo base_url('transaksi/inisialisasi'); ?>" method="post">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inisial">Kode Barang</label>
                                        <!-- Aktifkan form input di bawah jika transaksi menggunakan scanner
                                        <input type="text" name="inisial" id="inisial" class="form-control" placeholder="Kode Barang"> -->
                                        <!-- Start select chosen -->
                                        <select id="inisial" name="inisial" class="form-control chosen">
                                            <?php foreach ($barang as $row) : ?>
                                                <option value="<?php echo $row['kode_barang']; ?>"><?php echo $row['nama_barang']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <!-- End select chosen -->
                                        <?php echo form_error('inisial', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nama_barang">Nama Barang</label>
                                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama barang" value="<?php echo set_value('nama_barang'); ?>" disabled>
                                        <?php echo form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="jumlah">Jumlah</label>
                                        <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="0" value="<?php echo set_value('jumlah'); ?>" disabled>
                                        <?php echo form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="bagus">Kondisi Bagus</label>
                                        <input type="number" class="form-control" name="bagus" id="bagus" placeholder="0" value="<?php echo set_value('bagus'); ?>" disabled>
                                        <?php echo form_error('bagus', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="rusak">Kondisi rusak</label>
                                        <input type="number" class="form-control" name="rusak" id="rusak" placeholder="0" value="<?php echo set_value('rusak'); ?>" disabled>
                                        <?php echo form_error('rusak', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="tanggal_masuk">Tanggal Masuk</label>
                                    <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk" value="<?php echo set_value('tanggal_masuk'); ?>" disabled>
                                    <?php echo form_error('tanggal_masuk', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn bg-gradient-success">Cek Barang</button>
                                <a href="<?php echo base_url('transaksi/bm'); ?>" class="btn bg-gradient-primary">Kembali</a>
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