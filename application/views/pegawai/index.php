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
                        <li class="breadcrumb-item active"><?php echo $page; ?></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
            <hr>

            <a href="<?php echo base_url('masterdata/tambah_pegawai'); ?>" class="btn bg-gradient-success btn-sm mb-2"><i class="fas fa-plus"></i> Tambah Pegawai</a>
            <!-- Sweatalert -->
            <div class="flash-data" data-flashdata="<?php echo $this->session->flashdata('message'); ?>"></div>
            <!-- /.Swealert -->

        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row d-flex align-items-stretch">
                    <!-- looping profile -->
                    <?php foreach ($pegawai as $p) : ?>
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                            <div class="card bg-light">
                                <div class="card-header text-muted border-bottom-0">
                                    <?php echo $p['nama_bagian']; ?>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead"><b><?php echo $p['nama_pegawai']; ?></b></h2>
                                            <!-- <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p> -->
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-id-card"></i></span> Id : <?php echo $p['id_pegawai']; ?></li>
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span><?php echo $p['email']; ?></li>
                                                <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone : <?php echo $p['phone']; ?></li>
                                            </ul>
                                        </div>
                                        <div class="col-5 text-center">
                                            <a href="<?php echo base_url('assets/img/profile/' . $p['foto']); ?>">
                                                <img src="<?php echo base_url('assets/img/profile/' . $p['foto']); ?>" alt="user-avatar" class="img-circle img-fluid">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <a href="<?php echo base_url('masterdata/detail/' . $p['id_pegawai']); ?>" class="btn btn-sm bg-teal" data-toggle="tooltip" data-placement="top" title="detail stransaksi">
                                            <i class="fas fa-history"></i>
                                        </a>
                                        <?php if ($p['is_active'] == 1) : ?>
                                            <a href="<?php echo base_url('masterdata/deactive/' . $p['id_pegawai']); ?>" class="btn btn-sm bg-info" data-toggle="tooltip" data-placement="top" title="nonaktifkan">
                                                <b>ACTIVE</b>
                                            </a>
                                        <?php else : ?>
                                            <a href="<?php echo base_url('masterdata/activeted/' . $p['id_pegawai']); ?>" class="btn btn-sm bg-red" data-toggle="tooltip" data-placement="top" title="aktifkan">
                                                <b>DEACTIVE</b>
                                            </a>
                                        <?php endif; ?>
                                        <a href="<?php echo base_url('masterdata/edit_pegawai/' . $p['id_pegawai']); ?>" class="btn btn-sm btn-primary">
                                            <i class="fas fa-user"></i> Edit Profile
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- end looping profile -->

                </div>
            </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer">
                <nav aria-label="Contacts Page Navigation">
                    <ul class="pagination justify-content-center m-0">
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item"><a class="page-link" href="#">5</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item"><a class="page-link" href="#">7</a></li>
                        <li class="page-item"><a class="page-link" href="#">8</a></li>
                    </ul>
                </nav>
            </div> -->
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->