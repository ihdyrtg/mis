<!-- Main Footer -->
<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        <b>MIS</b> version - 1.9
    </div>
    <strong>Copyright &copy; 2021 - <?php echo date('Y'); ?> <a href="#">TI & Digitalisasi UPT Pusat Perpustakaan IAIN Padangsidimpuan</strong>
    .
    <!-- <div class="float-right d-none d-sm-inline-block">
        <b>AdminLTE</b> 3.1.0-rc
    </div> -->
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url('assets/template/'); ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url('assets/template/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/template/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/template/'); ?>dist/js/adminlte.js"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?php echo base_url('assets/template/'); ?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url('assets/template/'); ?>plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url('assets/template/'); ?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="plugins/jquery-mapael/maps/usa_states.min.js"></script>

<!-- ChartJS -->
<script src="<?php echo base_url('assets/template/'); ?>plugins/chart.js/Chart.min.js"></script>

<!-- DataTables  & Plugins -->
<script src="<?php echo base_url('assets/template/'); ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/template/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/template/'); ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/template/'); ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/template/'); ?>plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('assets/template/'); ?>plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url('assets/template/'); ?>plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url('assets/template/'); ?>plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url('assets/template/'); ?>plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url('assets/template/'); ?>plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url('assets/template/'); ?>plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url('assets/template/'); ?>plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/template/'); ?>dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/template/'); ?>dist/js/pages/dashboard2.js"></script>

<!-- SweetAlert -->
<script src="<?php echo base_url('assets/plugins/'); ?>sweetalert/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url('assets/plugins/'); ?>sweetalert/myscript.js"></script>

<!-- Live Search Chosen -->
<script src="<?php echo base_url('assets/plugins/') ?>livesearch/chosen.jquery.min.js"></script>
<script src="<?php echo base_url('assets/plugins/'); ?>livesearch/myscript.js"></script>

<!-- Datepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js"></script>

<script>
    $(".tm").on("change", function() {
        this.setAttribute(
            "data-date",
            moment(this.value, "DD-MM-YYY")
            .format(this.getAttribute("data-date-format"))
        )
    }).trigger("change")
</script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>

<!-- form multiple untuk lokasi-->
<script>
    $(document).ready(function(e) {
        $('.btnaddform').click(function(e) {
            e.preventDefault();

            $('.formtambah').append(`
            <tr>
                <td>
                    <select name="ruang[]" id="ruang[]" class="form-control">
                        <option value="">- Pilih Ruang -</option>
                        <?php foreach ($ruang as $r) : ?>
                            <option value="<?php echo $r['id_ruang']; ?>"><?php echo $r['nama_ruang']; ?>
                            <?php endforeach; ?>
                    </select>
                </td>
                <td><input type="text" name="jumlah[]" id="jumlah[]" class="form-control"></td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm bg-gradient-danger btnhapusform"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
            `);
        });
    });

    $(document).on('click', '.btnhapusform', function(e) {
        e.preventDefault();

        $(this).parents('tr').remove();
    });
</script>

<!-- form multiple untuk sirkulasi -->
<script>
    $(document).ready(function(e) {
        $('.btnaddform').click(function(e) {
            e.preventDefault();

            $('.formtambah').append(`
            <tr>
                <td>
                <select id="kode_barang[]" name="kode_barang[]" class="form-control">
                    <?php foreach ($barang as $row) : ?>
                        <option value="<?php echo $row['kode_barang']; ?>"><?php echo $row['nama_barang']; ?></option>
                    <?php endforeach; ?>
                </select>
                </td>
                <td>
                <input type="number" name="jumlah[]" id="jumlah[]" class="form-control" value="1">
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-sm bg-gradient-danger btnhapusform"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
            `);
        });
    });

    $(document).on('click', '.btnhapusform', function(e) {
        e.preventDefault();

        $(this).parents('tr').remove();
    });
</script>

<!-- page script chart dashboard-->
<script>
    $(function() {
        /* ChartJS
         * -------
         * Here we will create a few charts using ChartJS
         */

        //--------------
        //- AREA CHART -
        //--------------

        // Get context with jQuery - using jQuery's .get() method.
        var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

        var areaChartData = {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
            datasets: [{
                    // label: 'Digital Goods',
                    backgroundColor: 'rgba(60,141,188,0.9)',
                    borderColor: 'rgba(60,141,188,0.8)',
                    pointRadius: false,
                    pointColor: '#3b8bba',
                    pointStrokeColor: 'rgba(60,141,188,1)',
                    pointHighlightFill: '#fff',
                    pointHighlightStroke: 'rgba(60,141,188,1)',
                    data: [<?php echo $jan_bk; ?>, <?php echo $feb_bk; ?>, <?php echo $mar_bk; ?>, <?php echo $apr_bk; ?>, <?php echo $mei_bk; ?>, <?php echo $jun_bk; ?>, <?php echo $jul_bk; ?>, <?php echo $agu_bk; ?>, <?php echo $sep_bk; ?>, <?php echo $okt_bk; ?>, <?php echo $nov_bk; ?>, <?php echo $des_bk; ?>]
                },
                // {
                //     label: 'Electronics',
                //     backgroundColor: 'rgba(210, 214, 222, 1)',
                //     borderColor: 'rgba(210, 214, 222, 1)',
                //     pointRadius: false,
                //     pointColor: 'rgba(210, 214, 222, 1)',
                //     pointStrokeColor: '#c1c7d1',
                //     pointHighlightFill: '#fff',
                //     pointHighlightStroke: 'rgba(220,220,220,1)',
                //     data: [65, 59, 80, 81, 56, 55, 40]
                // },
            ]
        }

        var areaChartOptions = {
            maintainAspectRatio: false,
            responsive: true,
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    }
                }],
                yAxes: [{
                    gridLines: {
                        display: false,
                    }
                }]
            }
        }

        // This will get the first returned node in the jQuery collection.
        var areaChart = new Chart(areaChartCanvas, {
            type: 'bar',
            data: areaChartData,
            options: areaChartOptions
        })
    })
</script>

</body>

</html>