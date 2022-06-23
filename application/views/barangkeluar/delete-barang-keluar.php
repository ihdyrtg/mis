<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $page; ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('transaksi/bk'); ?>">Barang Keluar</a></li>
                        <li class="breadcrumb-item active"><?php echo $page; ?></li>
                    </ol>
                </div>
            </div>
            <form action="<?php echo base_url('transaksi/delete_bk/' . $bkeluar['id_keluar']); ?>" method="post">
                <div class="col-sm-12">
                    <input type="hidden" name="tersedia" id="tersedia" value="<?php echo $tersedia['jml_tersedia']; ?>">
                    <?php echo form_error('tersedia', '<small class="text-danger">', '</small>'); ?>
                    <input type="hidden" name="delete" id="delete" value="<?php echo $bkeluar['jumlah']; ?>">
                    <?php echo form_error('delete', '<small class="text-danger">', '</small>'); ?>
                    <input type="hidden" name="jum_rusak" id="jum_rusak" value="<?php echo $rusak['total_rusak']; ?>">
                    <?php echo form_error('jum_rusak', '<small class="text-danger">', '</small>'); ?>
                </div>
                <button type="submit" class="btn bg-gradient-danger"><i class="fas fa-check-circle"></i> Hapus</button>
            </form>
        </div><!-- /.container-fluid -->
    </section>
</div>
<!-- /.content-wrapper -->