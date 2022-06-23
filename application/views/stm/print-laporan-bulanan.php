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
        <div class="container">
            <section class="invoice">
                <!-- title row -->
                <div class="row">
                    <div class="col-1">
                        <img src="<?php echo base_url('assets/img/icon.png'); ?>">
                    </div>
                    <div class="col-11">
                        <h2 class="page-header text-center font-weight-bold mb-0">
                            KEMENTERIAN AGAMA REPUBLIK INDONESIA
                        </h2>
                        <h4 class="page-header text-center font-weight-bold mb-0">
                            INSTITUT AGAMA ISLAM NEGERI PADANGSIDIMPUAN
                        </h4>
                        <h5 class="page-header text-center font-weight-bold mb-0">
                            UPT PUSAT PERPUSTAKAAN IAIN PADANGSIDIMPUAN
                        </h5>
                        <P class="text-center mb-0">Jl. T. Rizal Nurdin Km. 4,5 Sihitang Padangsidimpuan 22733</P>
                        <P class="text-center mb-0">Telp. (0634) 22080, Fax. (0634) 24022, perpustakaan@iain-padangsidimpuan.ac.id</P>
                        <P class="text-center mb-0">Website: https://perpustakaan.iain-padangsidimpuan.ac.id</P>
                    </div>
                    <!-- /.col -->
                </div>
                <div class="col-12 hr"></div>
                <!-- info row -->
                <div class="row invoice-info">
                    <div class="col-sm-12 invoice-col">
                        <h5 class="text-center text-bold mb-3 mt-3"><?php echo $page; ?>
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
                                    <th class="text-center">No.</th>
                                    <th>Tanggal Serah</th>
                                    <th>Kepada</th>
                                    <th>Berupa</th>
                                    <th>Jumlah</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($laporan_stm as $row) : ?>
                                    <tr>
                                        <td width="50" class="text-center"><?php echo $no; ?></td>
                                        <td><?php echo tgl_bulan($row['tanggal_serah']); ?></td>
                                        <td><?php echo $row['nama_pegawai']; ?></td>
                                        <td><?php echo $row['terbilang']; ?></td>
                                        <td>Rp. <?php echo number_format($row['jumlah_serah']); ?></td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <th colspan="4" class="text-right">Total</th>
                                <th>Rp. <?php echo number_format($total_laporan_serah['total_laporan']); ?></th>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-7">
                        <br><br>
                        <p class="lead"> <br> Bendahara STM</p>
                        <br><br><br>
                        <p class="lead">Zuraidah</p>
                    </div>
                    <div class="col-4">
                        <p class="lead">Padangsidimpuan, <?php echo tgl_bulan(date('j  M  Y')); ?></p>
                        <p class="lead">Mengetahui <br> Kepala Perpustakaan</p>
                        <br><br><br>
                        <p class="lead">Yusri Fahmi</p>

                    </div>
                </div>
            </section>
        </div>
        <!-- /.content -->
    </div>
    <!-- ./wrapper -->
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>