<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 4 -->

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/'); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/'); ?>dist/css/adminlte.min.css">
    <!-- Icon -->
    <link rel="icon" href="<?php echo base_url('assets/img/icon.png'); ?>">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h2 class="page-header">
                        <img src="<?php echo base_url('assets/img/icon.png'); ?>" width="100"> UPT Pusat Perpustakaan IAIN Padangsidimpuan
                    </h2>
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
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th>Kode Barang</th>
                                <th>Nama Barang</th>
                                <th>Qty</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no  = 1; ?>
                            <?php foreach ($barang_invoice as $row) : ?>
                                <tr>
                                    <td class="text-center" width="50"><?php echo $no; ?></td>
                                    <td><?php echo $row['barang_kode']; ?></td>
                                    <td><?php echo $row['nama_barang']; ?></td>
                                    <td><?php echo $row['jumlah']; ?> <?php echo $row['satuan']; ?></td>
                                </tr>
                                <?php $no++; ?>
                            <?php endforeach; ?>
                            <tr>
                                <td colspan="3"><b>Total:</b></td>
                                <td><?php echo $subtotal['subtotal']; ?> Pcs</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-8">

                </div>
                <!-- /.col -->
                <div class="col-4">
                    <p class="lead">Padangsidimpuan, <?php echo tgl_bulan(date('j  M  Y')); ?></p>
                    <p class="lead">UPT Perpustakaan <br>Bagian Kerumahtanggaan</p>
                    <br><br><br>
                    <p class="lead"><?php echo $kordinator['nama_pegawai']; ?></p>

                </div>
                <!-- /.col -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->

    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>
</body>

</html>