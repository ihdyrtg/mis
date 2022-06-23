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
                        <li class="breadcrumb-item active"><?php echo $page; ?></li>
                    </ol>
                </div>
            </div>
            <hr>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- SELECT1 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Lihat Laporan</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <form action="<?php echo base_url('pelaporan/filter_bk'); ?>" method="post">
                                    <input type="hidden" name="nilaifilter" id="nilaifilter" value="1">
                                    <label class="text-primary">Filter berdasarkan tahun</label>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="tahun2">Pilih Tahun</label>
                                            <select name="tahun2" id="tahun2" class="form-control" required>
                                                <option value="">- Pilih -</option>
                                                <?php foreach ($tahun as $t) : ?>
                                                    <option value="<?php echo $t['tahun']; ?>"><?php echo $t['tahun']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php echo form_error('tahun2', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm bg-gradient-success">Proses</button>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <form action="<?php echo base_url('pelaporan/filter_bk'); ?>" method="post">
                                    <input type="hidden" name="nilaifilter" id="nilaifilter" value="2">
                                    <label class="text-primary">Filter berdasarkan tanggal</label>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tanggalawal">Tanggal Awal</label>
                                            <input type="date" class="form-control" name="tanggalawal" id="tanggalawal" required>
                                            <?php echo form_error('tanggalawal', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tanggalakhir">Tanggal Akhir</label>
                                            <input type="date" class="form-control" name="tanggalakhir" id="tanggalakhir" required>
                                            <?php echo form_error('tanggalakhir', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm bg-gradient-success">Proses</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <form action="<?php echo base_url('pelaporan/filter_bk'); ?>" method="post">
                                    <input type="hidden" name="nilaifilter" id="nilaifilter" value="3">
                                    <label class="text-primary">Filter berdasarkan bulan</label>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="tahun1">Pilih Tahun</label>
                                            <select name="tahun1" id="tahun1" class="form-control" required>
                                                <option value="">- Pilih -</option>
                                                <?php foreach ($tahun as $t) : ?>
                                                    <option value="<?php echo $t['tahun']; ?>"><?php echo $t['tahun']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php echo form_error('tahun1', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="bulanawal">Bulan Awal</label>
                                            <select name="bulanawal" id="bulanawal" class="form-control" required>
                                                <option value="">- Pilih -</option>
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                            <?php echo form_error('bulanawal', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="bulanakhir">Bulan Akhir</label>
                                            <select name="bulanakhir" id="bulanakhir" class="form-control" required>
                                                <option value="">- Pilih -</option>
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                            <?php echo form_error('bulanakhir', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm bg-gradient-success">Proses</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <!-- <div class="card-footer">
                    Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
                    the plugin.
                </div> -->
            </div>
            <!-- /.card -->

            <!-- SELECT2 EXAMPLE -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Print Laporan</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <form action="<?php echo base_url('pelaporan/print_bk'); ?>" method="post" target="_blank">
                                    <input type="hidden" name="nilaifilter" id="nilaifilter" value="1">
                                    <label class="text-primary">Print berdasarkan tahun</label>
                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="tahun2">Pilih Tahun</label>
                                            <select name="tahun2" id="tahun2" class="form-control" required>
                                                <option value="">- Pilih -</option>
                                                <?php foreach ($tahun as $t) : ?>
                                                    <option value="<?php echo $t['tahun']; ?>"><?php echo $t['tahun']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php echo form_error('tahun2', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm bg-gradient-info">Print</button>
                                </form>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <form action="<?php echo base_url('pelaporan/print_bk'); ?>" method="post" target="_blank">
                                    <input type="hidden" name="nilaifilter" id="nilaifilter" value="2">
                                    <label class="text-primary">Print berdasarkan tanggal</label>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tanggalawal">Tanggal Awal</label>
                                            <input type="date" class="form-control" name="tanggalawal" id="tanggalawal" required>
                                            <?php echo form_error('tanggalawal', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tanggalakhir">Tanggal Akhir</label>
                                            <input type="date" class="form-control" name="tanggalakhir" id="tanggalakhir" required>
                                            <?php echo form_error('tanggalakhir', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm bg-gradient-info">Print</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <form action="<?php echo base_url('pelaporan/print_bk'); ?>" method="post" target="_blank">
                                    <input type="hidden" name="nilaifilter" id="nilaifilter" value="3">
                                    <label class="text-primary">Print berdasarkan bulan</label>
                                    <div class="form-row">
                                        <div class="form-group col-md-2">
                                            <label for="tahun1">Pilih Tahun</label>
                                            <select name="tahun1" id="tahun1" class="form-control" required>
                                                <option value="">- Pilih -</option>
                                                <?php foreach ($tahun as $t) : ?>
                                                    <option value="<?php echo $t['tahun']; ?>"><?php echo $t['tahun']; ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <?php echo form_error('tahun1', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="bulanawal">Bulan Awal</label>
                                            <select name="bulanawal" id="bulanawal" class="form-control" required>
                                                <option value="">- Pilih -</option>
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                            <?php echo form_error('bulanawal', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                        <div class="form-group col-md-5">
                                            <label for="bulanakhir">Bulan Akhir</label>
                                            <select name="bulanakhir" id="bulanakhir" class="form-control" required>
                                                <option value="">- Pilih -</option>
                                                <option value="01">Januari</option>
                                                <option value="02">Februari</option>
                                                <option value="03">Maret</option>
                                                <option value="04">April</option>
                                                <option value="05">Mei</option>
                                                <option value="06">Juni</option>
                                                <option value="07">Juli</option>
                                                <option value="08">Agustus</option>
                                                <option value="09">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                            <?php echo form_error('bulanakhir', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm bg-gradient-info">Print</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
                <!-- <div class="card-footer">
                    Visit <a href="https://select2.github.io/">Select2 documentation</a> for more examples and information about
                    the plugin.
                </div> -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

<!-- Page specific script -->
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservationdate').datetimepicker({
            format: 'L'
        });
        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

        //Timepicker
        $('#timepicker').datetimepicker({
            format: 'LT'
        })

        //Bootstrap Duallistbox
        $('.duallistbox').bootstrapDualListbox()

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        $('.my-colorpicker2').on('colorpickerChange', function(event) {
            $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
        });

        $("input[data-bootstrap-switch]").each(function() {
            $(this).bootstrapSwitch('state', $(this).prop('checked'));
        });

    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    });

    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false;

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template");
    previewNode.id = "";
    var previewTemplate = previewNode.parentNode.innerHTML;
    previewNode.parentNode.removeChild(previewNode);

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
        url: "/target-url", // Set the url
        thumbnailWidth: 80,
        thumbnailHeight: 80,
        parallelUploads: 20,
        previewTemplate: previewTemplate,
        autoQueue: false, // Make sure the files aren't queued until manually added
        previewsContainer: "#previews", // Define the container to display the previews
        clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    });

    myDropzone.on("addedfile", function(file) {
        // Hookup the start button
        file.previewElement.querySelector(".start").onclick = function() {
            myDropzone.enqueueFile(file);
        };
    });

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
        document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
    });

    myDropzone.on("sending", function(file) {
        // Show the total progress bar when upload starts
        document.querySelector("#total-progress").style.opacity = "1";
        // And disable the start button
        file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
    });

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
        document.querySelector("#total-progress").style.opacity = "0";
    });

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
        myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
    };
    document.querySelector("#actions .cancel").onclick = function() {
        myDropzone.removeAllFiles(true);
    };
    // DropzoneJS Demo Code End
</script>