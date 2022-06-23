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
                        <form action="<?php echo base_url('transaksi/edit_bm/' . $bmasuk['id_bm']); ?>" method="post">
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="kode_barang">Kode Barang</label>
                                        <input type="text" class="form-control" name="kode_barang" id="kode_barang" value="<?php echo $bmasuk['kode_barang']; ?>" readonly>
                                        <?php echo form_error('kode_barang', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="nama_barang">Nama Barang</label>
                                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama barang" value="<?php echo $bmasuk['nama_barang']; ?>" readonly>
                                        <?php echo form_error('nama_barang', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-4">
                                        <label for="jumlah">Total</label>
                                        <input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="0" value="<?php echo $bmasuk['jumlah']; ?>">
                                        <?php echo form_error('jumlah', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="bagus">Jumlah Bagus</label>
                                        <input type="text" class="form-control" name="bagus" id="bagus" placeholder="0" value="<?php echo $bmasuk['bagus']; ?>">
                                        <?php echo form_error('bagus', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="rusak">Jumlah Rusak</label>
                                        <input type="text" class="form-control" name="rusak" id="rusak" placeholder="0" value="<?php echo $bmasuk['rusak']; ?>">
                                        <?php echo form_error('rusak', '<small class="text-danger">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="tanggal_masuk">Tanggal Masuk</label>
                                    <input type="date" class="form-control" name="tanggal_masuk" id="tanggal_masuk" date-date-format="DD/MM/YYYY" placeholder="dd/mm/yyyy" value="<?php echo $bmasuk['tanggal_masuk']; ?>">
                                    <?php echo form_error('tanggal_masuk', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn bg-gradient-success">Edit</button>
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