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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('sirkulasi'); ?>">Sirkulasi</a></li>
                        <li class="breadcrumb-item active"><?php echo $page; ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- <div class="callout callout-info">
                        <h5><i class="fas fa-info"></i> Note:</h5>
                        Halaman ini telah ditingkatkan untuk dapat dicetak. Klik tombol print di bagian bawah faktur untuk cetak.
                    </div> -->

                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                    <!-- <i class="fas fa-globe"></i> AdminLTE, Inc. -->
                                    <img src="<?php echo base_url('assets/img/icon.png'); ?>" width="60"> UPT Pusat Perpustakaan IAIN Padangsidimpuan
                                </h4>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-3 invoice-col">
                                Penyerah Barang
                                <address>
                                    <strong><?php echo $detail['nama_pegawai']; ?></strong><br>
                                    Bagian: <?php echo $detail['nama_bagian']; ?>
                                </address>
                            </div>
                            <div class="col-sm-3 invoice-col">
                                Penerima Barang
                                <address>
                                    <strong><?php echo $detail['penerima_barang']; ?></strong><br>
                                    Dari: <?php echo $detail['unit']; ?>
                                </address>
                            </div>
                            <div class="col-sm-3 invoice-col">
                                <?php if ($detail['keterangan'] == 'pinjam') : ?>
                                    <address>
                                        Dipinjam:<br>
                                        <strong><?php echo $detail['unit']; ?></strong>
                                    </address>
                                <?php else : ?>
                                    Pengembali Barang
                                    <address>
                                        <strong><?php echo $detail['return_barang']; ?></strong><br>
                                        Dari: <?php echo $detail['unit']; ?>
                                    </address>
                                <?php endif; ?>
                            </div>
                            <div class="col-sm-3 invoice-col">
                                <b>Invoice #<?php echo $detail['invoice']; ?></b><br>
                                <b>Tanggal Pinjam:</b><br>
                                <?php echo tgl_bulan($detail['tanggal_pinjam']); ?>
                            </div>
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Qty</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no  = 1; ?>
                                        <?php foreach ($barang_invoice as $row) : ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $row['barang_kode']; ?></td>
                                                <td><?php echo $row['nama_barang']; ?></td>
                                                <td><?php echo $row['jumlah']; ?></td>
                                            </tr>
                                            <?php $no++; ?>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td colspan="3"><b>Total:</b></td>
                                            <td><?php echo $subtotal['subtotal']; ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->

                        <!-- this row will not appear when printing -->
                        <div class="row no-print">
                            <div class="col-12">
                                <a href="<?php echo base_url('sirkulasi/print_invoice/' . $detail['invoice']); ?>" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                <!-- <button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                    Payment
                                </button>
                                <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                    <i class="fas fa-download"></i> Generate PDF
                                </button> -->
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>