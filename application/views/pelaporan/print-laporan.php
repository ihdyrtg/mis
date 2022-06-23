<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/'); ?>plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/template/'); ?>dist/css/adminlte.min.css">
    <!-- Icon -->
    <link rel="icon" href="<?php echo base_url('assets/img/icon.png'); ?>">

    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        .wrapper .invoice .row img {
            width: 9.375em;
        }

        .wrapper .invoice .hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, .9);
        }

        .wrapper .invoice .row table {
            width: 100%;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-1">
                    <img src="<?php echo base_url('assets/img/icon.png'); ?>">
                </div>
                <div class="col-11">
                    <h2 class="page-header text-center font-weight-bold">
                        KEMENTERIAN AGAMA REPUBLIK INDONESIA
                    </h2>
                    <h3 class="page-header text-center font-weight-bold">
                        INSTITUT AGAMA ISLAM NEGERI PADANGSIDIMPUAN
                    </h3>
                    <h5 class="page-header text-center font-weight-bold">
                        UPT PUSAT PERPUSTAKAAN IAIN PADANGSIDIMPUAN
                    </h5>
                    <P class="text-center font-italic">Jl. T. Rizal Nurdin Km. 4,5 Sihitang Padangsidimpuan 22733</P>
                </div>
                <!-- /.col -->
            </div>
            <div class="col-12 hr"></div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-12 invoice-col">
                    <h5 class="text-center text-bold mb-3 mt-3">Daftar Barang Masuk UPT Pusat Perpustakaan IAIN Padangsidimpuan <br>
                        <?php echo $page; ?>
                    </h5>
                </div>
                <!-- /.col -->
                <!-- <div class="col-sm-4 invoice-col">

                </div> -->
                <!-- /.col -->
                <!-- <div class="col-sm-4 invoice-col">

                </div> -->
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-12 table-responsive">
                    <table border="1" cellpadding="5">
                        <thead>
                            <tr>
                                <th class="text-center" rowspan="2">No.</th>
                                <th class="text-center" rowspan="2">Tanggal Masuk</th>
                                <th class="text-center" rowspan="2">Nama Barang</th>
                                <th class="text-center" rowspan="2">Jumlah</th>
                                <th class="text-center" colspan="2">Kondisi</th>
                            </tr>
                            <tr>
                                <th class="text-center">Bagus</th>
                                <th class="text-center">Rusak</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($datafilter as $df) : ?>
                                <tr>
                                    <td width="50" class="text-center"><?php echo $no; ?></td>
                                    <td class="text-center"><?php echo tgl_bulan($df['tanggal_masuk']); ?></td>
                                    <td class="text-center"><?php echo $df['nama_barang']; ?></td>
                                    <td class="text-center"><?php echo $df['jumlah']; ?></td>
                                    <td class="text-center"><?php echo $df['bagus']; ?></td>
                                    <td class="text-center"><?php echo $df['rusak']; ?></td>
                                </tr>
                                <?php $no++; ?>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-right">Total</th>
                                <th class="text-center"><?php echo $total_masuk['jumlah']; ?></th>
                                <th class="text-center"><?php echo $total_bagus['bagus']; ?></th>
                                <th class="text-center"><?php echo $total_rusak['rusak']; ?></th>
                            </tr>
                        </tfoot>
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
                    <p class="lead">Kerumahtanggaan</p>
                    <br><br><br>
                    <p class="lead"><?php echo $kordinator['nama_pegawai']; ?></p>

                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>