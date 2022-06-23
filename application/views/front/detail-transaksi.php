<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0"><?php echo $page; ?></h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- <div class="card-header">
                    <h3 class="card-title">DataTable with minimal features & hover style</h3>
                </div> -->
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="text-bold">Detail Transaksi Permintaan Barang</p>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?php echo base_url('home/transaksipegawai'); ?>"><i class="fa fa-backward text-info float-right"></i></a>
                        </div>
                    </div>
                    Nama : <?php echo $pegawai['nama_pegawai']; ?> <br>
                    Bagian : <?php echo $pegawai['nama_bagian']; ?>
                    </p>
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th width="20">No.</th>
                                <th class="text-center">Nama Barang</th>
                                <th class="text-center">Jumlah</th>
                                <th class="text-center">Tanggal Transaksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($barang_keluar as $bk) : ?>
                                <tr>
                                    <td class="text-center"><?php echo $no; ?></td>
                                    <td><?php echo $bk['nama_barang']; ?></td>
                                    <td class="text-center"><?php echo $bk['jumlah']; ?> <?php echo $bk['satuan'];?></td>
                                    <td class="text-center"><?php echo tgl_bulan($bk['tanggal_keluar']); ?></td>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->