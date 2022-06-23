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
                        <li class="breadcrumb-item"><a href="<?php echo base_url('masterdata/pegawai'); ?>">Biodata Pegawai</a></li>
                        <li class="breadcrumb-item active"><?php echo $page; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <hr>
            <?php echo $this->session->flashdata('message'); ?>
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
                        <?php echo form_open_multipart('masterdata/edit_pegawai/' . $pegawai['id_pegawai']); ?>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label for="id_pegawai">Id Pegawai</label>
                                    <input type="text" class="form-control" name="id_pegawai" id="id_pegawai" placeholder="001" value="<?php echo $pegawai['id_pegawai']; ?>">
                                    <?php echo form_error('id_pegawai', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-9">
                                    <label for="nama_pegawai">Nama Pegawai</label>
                                    <input type="text" class="form-control" name="nama_pegawai" id="nama_pegawai" placeholder="Nama Pegawai" value="<?php echo $pegawai['nama_pegawai']; ?>">
                                    <?php echo form_error('nama_pegawai', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $pegawai['email']; ?>">
                                    <?php echo form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone" value="<?php echo $pegawai['phone']; ?>">
                                    <?php echo form_error('phone', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="bagian">Bagian</label>
                                    <select name="bagian" id="bagian" class="form-control">
                                        <option value="">- Pilih Bagian -</option>
                                        <?php foreach ($bagian as $b) : ?>
                                            <option value="<?php echo $b['id_bagian']; ?>" <?php echo $b['id_bagian'] == $pegawai['bagian_id'] ? "selected" : ''; ?>><?php echo $b['nama_bagian']; ?>
                                            <?php endforeach; ?>
                                    </select>
                                    <?php echo form_error('bagian', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label>Gambar Sebelumnya</label><br>
                                    <?php if (empty($pegawai['foto'])) : ?>
                                        <img src="<?php echo base_url('assets/img/profile/default.jpg'); ?>" width="150px" />
                                    <?php else : ?>
                                        <img src="<?php echo base_url('assets/img/profile/' . $pegawai['foto']); ?>" width="150px" />
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="foto">Gambar Baru</label>
                                    <input type="file" class="form-control" name="foto" id="foto" onchange="tampilkanPreview(this,'preview')">
                                    <p class="text-primary">Ukuran file Max. 2Mb</p>
                                    <img id="preview" width="150px" />
                                </div>
                            </div>
                            <button type="submit" class="btn bg-gradient-success">Update</button>
                            <a href="<?php echo base_url('masterdata/pegawai'); ?>" class="btn bg-gradient-primary">Kembali</a>
                        </div>
                        <?php echo form_close(); ?>
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

<!-- Tampilkan priview -->
<script>
    function tampilkanPreview(image, idpreview) { //membuat objek gambar
        var gb = image.files;
        //loop untuk merender gambar
        for (var i = 0; i < gb.length; i++) { //bikin variabel
            var gbPreview = gb[i];
            var imageType = /image.*/;
            var preview = document.getElementById(idpreview);
            var reader = new FileReader();
            if (gbPreview.type.match(imageType)) { //jika tipe data sesuai
                preview.file = gbPreview;
                reader.onload = (function(element) {
                    return function(e) {
                        element.src = e.target.result;
                    };
                })(preview);
                //membaca data URL gambar
                reader.readAsDataURL(gbPreview);
            } else { //jika tipe data tidak sesuai
                alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
            }
        }
    }
</script>
<!-- End Tampil preview -->